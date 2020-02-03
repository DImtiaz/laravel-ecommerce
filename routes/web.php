<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend site
Route::get('/', 'HomeController@index');





//backend side
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/control', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::post('/admin-dashboard' , 'AdminController@dashboard');

//category related routes
Route::get('/add-category' , 'CategoryController@add');
Route::get('/all-category' , 'CategoryController@all_category');
Route::post('/save-category' , 'CategoryController@save_category');
Route::get('/inactive_category/{category_id}' , 'CategoryController@inactive_category');
Route::get('/active_category/{category_id}' , 'CategoryController@active_category');
Route::get('/edit_category/{category_id}' , 'CategoryController@edit_category');
Route::get('/delete_category/{category_id}' , 'CategoryController@delete_category');
Route::post('/update_category/{category_id}' , 'CategoryController@update_category');


//manufacture related routes
Route::get('/add-manufacture', 'ManufactureController@index');
Route::get('/all-manufacture','ManufactureController@all_manufacture');
Route::get('/inactive_manufacture/{manufacture_id}' , 'ManufactureController@inactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}' , 'ManufactureController@active_manufacture');
Route::post('/save-manufacture', 'ManufactureController@save_manufacture');
Route::get('/edit_manufacture/{manufacture_id}' , 'ManufactureController@edit_manufacture');
Route::get('/delete_manufacture/{manufacture_id}' , 'ManufactureController@delete_manufacture');
Route::post('/update_manufacture/{manufacture_id}' , 'ManufactureController@update_manufacture');

//product related routes
Route::get('/add-product','ProductController@index');
Route::get('/all-product','ProductController@all_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/inactive_product/{product_id}' , 'ProductController@inactive_product');
Route::get('/active_product/{product_id}' , 'ProductController@active_product');
Route::get('/delete_product/{product_id}' , 'ProductController@delete_product');
Route::get('/edit_product/{product_id}' , 'ProductController@edit_product');
Route::post('/update_product/{product_id}' , 'ProductController@update_product');


//slider related routes
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@all_slider');
Route::post('/save-slider','SliderController@save_slider');