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
Route::get('/dashboard', 'AdminController@show_dashboard');
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
