<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicineModel;
use App\CustomerModel;
use App\RetailSaleModel;
use App\RetailSaleChildModel;
use App\StockModel;

class RetailSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine_data=MedicineModel::all();
        $customer_data=CustomerModel::where('customer_status','Active')->get();
    return view('Admin.Sale.retail_sale',['medicine_data'=>$medicine_data,'customer_data'=>$customer_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $retail_sale_data=RetailSaleChildModel::join('customer','customer.customer_id','=','retail_sale_child.customer_name')->get();
      return view('Admin.Sale.retail_sale_report',['retail_sale_data'=>$retail_sale_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function retail_sale(Request $request)
    {
      $retail_sale_child=new RetailSaleChildModel;
      $retail_sale_child->date=$request->date;
      $retail_sale_child->customer_name=$request->customer_name;
      $retail_sale_child->invoice_id=$request->invoice_id;
      $retail_sale_child->grand_total=$request->grand_total;
      $retail_sale_child->payment=$request->payment;
      $retail_sale_child->save();

      for($i=0;$i<count($request->medicine_code);$i++)
      {
          $retail_sale=new RetailSaleModel;
              $stock=StockModel::where('medicine_code',$request->medicine_code[$i])->first();
              $stock_update=$stock->total_stock-$request->quantity[$i];
              $stock->update(['total_stock'=>$stock_update]);
          $retail_sale->medicine_code=$request->medicine_code[$i];
          $retail_sale->quantity=$request->quantity[$i];
          $retail_sale->invoice_id=$request->invoice_id;
          $retail_sale->save();
      }
    }


    public function retail_data(Request $request)
    {
      $invoice_data=RetailSaleChildModel::where('invoice_id',$request->invoice_id)->first();
      $invoice_child=RetailSaleModel::where('invoice_id',$request->invoice_id)->get();
      $customer_data=CustomerModel::where('customer_id',$invoice_data->customer_name)->first();


       $table="<div class=\"col-sm-12\" style=\"margin-left: -14px;\">";
           $table.="<div class=\"col-sm-6\">";
             $table.="<p>INVOICE ID:</p>";
           $table.="</div>";
           $table.="<div class=\"col-sm-6\">";
              $table.="<p>$invoice_data->invoice_id</p>";
           $table.="</div>";
       $table.="</div>";
       $table.="<div class=\"col-sm-12\" style=\"margin-left: -14px;\">";
          $table.="<div class=\"col-sm-6\">";
             $table.="<p>CUSTOMER NAME:</p>";
          $table.="</div>";
           $table.="<div class=\"col-sm-6\">";
               $table.="<p>$customer_data->customer_name</p>";
           $table.="</div>";
           $table.="<div class=\"col-sm-6\">";
               $table.="<input type='hidden' class='total' value='$invoice_data->grand_total'/>";
           $table.="</div>";
           $table.="<div class=\"col-sm-6\">";
               $table.="<input type='hidden' class='payment' value='$invoice_data->payment'/>";
           $table.="</div>";
       $table.="</div>";
       $table.="<div class=\"col-sm-12\" style=\"margin-left: -14px;\">";
           $table.="<div class=\"col-sm-6\">";
              $table.="<p>DATE:</p>";
           $table.="</div>";
           $table.="<div class=\"col-sm-6\">";
           $date=date('d-M-Y',strtotime($invoice_data->date));
              $table.="<p>$date</p>";
           $table.="</div>";
       $table.="</div>";
       $table.="<table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\">";
       $table.="<tr>";
             $table.="<th colspan=\"6\" style=\"text-align: center;\">OVERVIEW</th>";
       $table.="</tr>";
           $table.="<tr>";
             $table.="<th>ITEM TYPE</th>";
             $table.="<th>MEDICINE CODE</th>";
             $table.="<th>MEDICINE NAME</th>";
             $table.="<th>MEDICINE PRICE</th>";
             $table.="<th>QUANTITY</th>";
             $table.="<th>SUBTOTAL</th>";
           $table.="</tr>";
           $table.="<tr>";
           $table.="<div>";
           foreach($invoice_child as $invoice_child_data)
           {
             $medicine_data=MedicineModel::where('medicine_code',$invoice_child_data->medicine_code)->first();
             $table.="<td>$medicine_data->catagory</td>";
             $table.="<td>$invoice_child_data->medicine_code</td>";
             $table.="<td>$medicine_data->medicine_name</td>";
             $table.="<td>$medicine_data->whole_sell_price</td>";
             $table.="<td>$invoice_child_data->quantity</td>";
             $subtotal=$medicine_data->whole_sell_price*$invoice_child_data->quantity;
             $table.="<td>$subtotal</td>";
             $table.="</tr>";
           }

         $table.="</table>";
         echo $table;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
