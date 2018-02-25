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