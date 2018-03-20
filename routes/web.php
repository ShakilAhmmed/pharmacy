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

Route::get('/', function () {
    return view('index');
});


Auth::routes();

Route::get('/admin', 'Admin@index')->name('admin');


//Medicine Module
Route::resource('/company','CompanyController');
Route::resource('/catagory','CatagoryController');
Route::resource('/desk','DeskController');
Route::resource('/medicine','MedicineController');
//Purcase
Route::resource('/purcase','PurcaseController');
Route::post('/medicine_data','PurcaseController@medicine');
Route::post('/medicine_name','PurcaseController@medicine_name');
Route::post('/purcase_update','PurcaseController@purcase_update');
Route::get('/rest_report','PurcaseController@rest_report');
//Sale
Route::resource('/whole_sale','WholeSaleController');
Route::get('/medicine_data_sale','WholeSaleController@medicine_data_sale');
Route::post('/medicine_price','WholeSaleController@medicine_price');