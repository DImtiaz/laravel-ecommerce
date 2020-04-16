<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class OrderController extends Controller
{
    public function manage_orders(){
     $all_order_info=DB::table('tbl_orders')
				->join('tbl_customer','tbl_orders.customer_id','=','tbl_customer.customer_id')
				->select('tbl_orders.*','tbl_customer.customer_full_name')
				->get();
    	$manage_order=view('admin.manage_orders')
    	->with('all_order_info', $all_order_info);
    	return view('admin_layout')
    			->with('admin.manage_orders' , $manage_order);
    }

    public function view_order($order_id){
    	$order_by_id = DB::table('tbl_orders')
    				->join('tbl_customer','tbl_orders.customer_id', '=', 'tbl_customer.customer_id')
    				->join('tbl_order_details','tbl_orders.order_id', '=', 'tbl_order_details.order_id')
    				->join('tbl_shipping', 'tbl_orders.shipping_id', '=', 'tbl_shipping.shipping_id')
    				->select('tbl_orders.*','tbl_order_details.*', 'tbl_shipping.*','tbl_customer.*')
    				->where('tbl_orders.order_id', $order_id)
    				->get();

    	$view_order = view('admin.view_order')
    					->with('order_by_id', $order_by_id);
    	return view('admin_layout')
    			->with('admin.view_order', $view_order);


    	// echo "<pre>";
    	// print_r($order_by_id);
    	// echo "</pre>";
    }
}
