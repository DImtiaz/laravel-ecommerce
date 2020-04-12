<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SliderController extends Controller
{
    public function index(){
    	return view('admin.add_slider');
    }

    public function save_slider(Request $request){ 
    	$data=array();
        $data['slider_text1'] = $request->slider_text1;
        $data['slider_text2'] = $request->slider_text2;
    	$data['publication_status']=$request->publication_status;
    	$image=$request->file('slider_image');

    	 if($image){
    	 	$image_name=str::random(20);
    	 	$ext=strtolower($image->getClientOriginalExtension());
    	 	$image_full_name=$image_name.'.'.$ext;
    	 	$upload_path='slider/';
    	 	$image_url=$upload_path.$image_full_name;
    	 	$success=$image->move($upload_path,$image_full_name);
    	 	if($success){
    	 		$data['slider_image']=$image_url;

    	 		DB::table('tbl_slider')->insert($data);
    	 		Session::put('message','Slider added Successfully');
    	 		return Redirect('/add-slider');
    	 		// echo "<pre>";
    	 		// print_r($data);
    	 		// echo "</pre>";
    	 		// exit();
    	 	}
    	 }
    	 $data['slider_image']='';
    	 DB::table('tbl_slider')->insert($data);
    	 Session::put('message','Failed to add slider');
    	 return Redirect::to('add-slider');

    }

    public function all_slider(){
    	$all_slider=DB::table('tbl_slider')->get();
    	$manage_slider=view('admin.all_slider')
    					->with('all_slider',$all_slider);
    	return view('admin_layout')
    			->with('admin.all_slider',$manage_slider);
    }

    public function inactive_slider($slider_id){
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['publication_status'=>0]);
    			Session::put('message','Slider Inactive Successfull');
    			return Redirect::to('/all-slider');
    }

    public function active_slider($slider_id){
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['publication_status'=>1]);
    			Session::put('message','Slider Active Successfull');
    			return Redirect::to('/all-slider');
    }

    public function delete_slider($slider_id){
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->delete();

    		Session::put('message','Sliedr Deleted Successfully');
    		return Redirect::to('/all-slider');
    }
}
