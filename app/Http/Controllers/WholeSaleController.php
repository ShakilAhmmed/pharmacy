<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicineModel;
use App\StockModel;
use App\WholeSaleModel;
use App\WholeSaleChildModel;
use Validator;
use Session;

class WholeSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine_data=MedicineModel::all();;
        return view('Admin.Sale.whole_sale',['medicine_data'=>$medicine_data]);
    }

    public function medicine_data_sale()
    {
        return MedicineModel::all();
    }

    public function medicine_price(Request $request)
    {
        return      MedicineModel::join('stock','stock.medicine_code','=','medicine.medicine_code')->where('medicine.medicine_code',$request->medicine_code)->first();
        //return MedicineModel::where('medicine_code',$request->medicine_code)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=MedicineModel::join('stock','stock.medicine_code','=','medicine.medicine_code')->get();
        return view('Admin.Purcase.stock_report',['report_data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function sale(Request $request)
    {
          $whole_sale_child=new WholeSaleChildModel;
          $whole_sale_child->date=$request->date;
          $whole_sale_child->patient_name=$request->patient_name;
          $whole_sale_child->invoice_id=$request->invoice_id;
          $whole_sale_child->grand_total=$request->grand_total;
          $whole_sale_child->payment=$request->payment;
          $whole_sale_child->save();

          for($i=0;$i<count($request->medicine_code);$i++)
          {
              $whole_sale=new WholeSaleModel;
                  $stock=StockModel::where('medicine_code',$request->medicine_code[$i])->first();
                  $stock_update=$stock->total_stock-$request->quantity[$i];
                  $stock->update(['total_stock'=>$stock_update]);
              $whole_sale->medicine_code=$request->medicine_code[$i];
              $whole_sale->quantity=$request->quantity[$i];
              $whole_sale->invoice_id=$request->invoice_id;
              $whole_sale->save();
          }
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
