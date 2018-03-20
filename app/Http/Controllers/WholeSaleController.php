<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicineModel;
use App\StockModel;

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
        return MedicineModel::join('stock','stock.medicine_code','=','medicine.medicine_code')->where('medicine.medicine_code',$request->medicine_code)->first();
        //return MedicineModel::where('medicine_code',$request->medicine_code)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=StockModel::join('medicine','medicine.medicine_code','=','stock.medicine_code')->get();
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
        //
    }
}
