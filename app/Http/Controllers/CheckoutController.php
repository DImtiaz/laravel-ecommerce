<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckoutController extends Controller
{
    public function customer_login_check(){
    	return view('pages.login');
    }

    public function customer_registration(Request $request){
    	$data = array();
    	$data['customer_full_name']= $request->customer_name;
    	$data['customer_email']= $request->customer_email;
    	$data['customer_password']= md5($request->customer_password);
    	$data['customer_mobile_number']= $request->mobile_number;

    	$customer_id=DB::table('tbl_customer')
    				->insertGetId($data);

    	Session::put('customer_id', $customer_id);
    	Session::put('customer_name', $request->customer_name);
    	return Redirect('/checkout'); 
    }

    public function checkout(){
    	return view('pages.checkout');
    }

    public function save_shipping_info(Request $request){
    	$data['email'] = $request->email;
    	$data['full_name'] = $request->full_name;
    	$data['address'] = $request->address;
    	$data['phone_number'] = $request->phone_number;
    	$data['city'] = $request->city;

    	$shipping_id = DB::table('tbl_shipping')
    							->insertGetId($data);

    	Session::put('shipping_id', $shipping_id);
    	return Redirect::to('/payment');
    }

    public function customer_login(Request $req){
    	$customer_email = $req->customer_email;
    	$customer_password = md5($req->customer_password);

    	$result = DB::table('tbl_customer')
    				->where('customer_email', $customer_email)
    				->where('customer_password', $customer_password)
    				->first();

    	if($result){
    		Session::put('customer_id', $result->customer_id);
    		return Redirect::to('/checkout');
    	}
    	else{
    		return Redirect::to('/customer_login_check');
    	}
    }

    public function customer_logout(){
    	Session::flush();
    	Cart::destroy();
    	return Redirect('/');
    }

    public function payment(){
        $shipping_id = Session::get('shipping_id');
        $data = DB::table('tbl_shipping')
                    ->where('shipping_id', $shipping_id)
                    ->get();
        $shipping_details = view('pages.payment')
                            ->with('shipping_details', $data);
        return view('layout')
                ->with('pages.payment', $shipping_details);

        // print_r($data);
    }

    public function confirmed(){
        $shipping_id = Session::get('shipping_id');
        $confirmed = DB::table('tbl_shipping')
                        ->where('shipping_id', $shipping_id)
                        ->update(['is_confirmed'=> 1]);
        $pdata = array();
        $pdata['payment_method']= 'Cash On Delivery';
        $pdata['payment_status']= 'pending';
        $payment_id = DB::table('tbl_payment')
                        ->insertGetId($pdata);

        $odata = array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']= $payment_id;
        $odata['order_total']= Cart::total();
        $odata['order_status']='pending';
        $order_id = DB::table('tbl_orders')
                        ->insertGetId($odata);

        $oddata = array();
        $contents = Cart::content();

        foreach($contents as $v_content){
            $oddata['order_id'] =$order_id;
            $oddata['product_id'] =$v_content->id;
            $oddata['product_name'] =$v_content->name;
            $oddata['product_price'] =$v_content->price;
            $oddata['product_price'] =$v_content->price;
            $oddata['product_sales_quantity'] =$v_content->qty;

            DB::table('tbl_order_details')
                    ->insert($oddata);
        }


        $data = DB::table('tbl_shipping')
                    ->where('shipping_id', $shipping_id)
                    ->get();
        $shipping_details = view('pages.confirmed')
                            ->with('shipping_details', $data);
        return view('layout2')
                ->with('pages.confirmed', $shipping_details);
    }
}
