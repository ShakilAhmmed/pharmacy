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

//PDF
Route::get('/catagory_pdf','PdfController@catagory_pdf');
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
//MEDICINE WISE PURCASE REPORT
  Route::get('/stock_report/{name}','PurcaseController@stock_report');
//Sale
Route::resource('/whole_sale','WholeSaleController');
Route::resource('/whole_sale_report','WholeSaleReport');
Route::get('/medicine_data_sale','WholeSaleController@medicine_data_sale');
Route::post('/medicine_price','WholeSaleController@medicine_price');
Route::post('/sale','WholeSaleController@sale');
Route::post('/invoice_data','WholeSaleReport@invoice_data');

//Customer
Route::resource('/customer','CustomerController');
//Retail Sale
Route::resource('/retail_sale','RetailSaleController');
Route::post('/retail_sale','RetailSaleController@retail_sale');
Route::post('/retail_data','RetailSaleController@retail_data');
Route::post('/retail_sale_pay','RetailSaleController@retail_sale_pay');

//Expense
Route::resource('/expense_catagory','ExpenseController');
//Expense For
Route::resource('/expense_for','ExpenseFor');
//Inventory
Route::resource('/inventory_report','InventoryReport');
