<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WholeSaleModel;
use App\WholeSaleChildModel;
use App\MedicineModel;
use Session;
class WholeSaleReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whole_sale_data=WholeSaleChildModel::all();
        return view('Admin.Sale.whole_sale_report',['whole_sale_data'=>$whole_sale_data]);
    }

    public function invoice_data(Request $request)
    {
      $invoice_data=WholeSaleChildModel::where('invoice_id',$request->invoice_id)->first();
      $invoice_child=WholeSaleModel::where('invoice_id',$request->invoice_id)->get();


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
             $table.="<p>PATIENT NAME:</p>";
          $table.="</div>";
           $table.="<div class=\"col-sm-6\">";
               $table.="<p>$invoice_data->patient_name</p>";
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      //echo $id;
        WholeSaleModel::where('invoice_id',$id)->delete();
        WholeSaleChildModel::where('invoice_id',$id)->delete();
        Session::flash('success','Invoice Deleted Successfully');
        return back();
    }
}
