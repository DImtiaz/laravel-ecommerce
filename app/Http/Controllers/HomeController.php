<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index(){
    	$all_published_product=DB::table('tbl_products')
				->where('tbl_products.publication_status',1)
				->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
				->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
				->select('tbl_products.*','tbl_category.category_name', 'tbl_manufacture.manufacture_name')
				->limit(9)
				->get();
    	$manage_published_product=view('pages.home_content')
    	->with('all_product_info', $all_published_product);
    	return view('layout')
    			->with('pages.home_content' , $manage_published_product);
    	//return view('pages.home_content');
    }
}
