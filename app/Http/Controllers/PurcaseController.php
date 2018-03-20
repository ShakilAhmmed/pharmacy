<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicineModel;
use App\CompanyModel;
use App\PurcaseModel;
use App\StockModel;
use Validator;
use Session;
use Redirect;
class PurcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $company_data=CompanyModel::where('company_status','Active')->get();
        return view('Admin.Purcase.purcase',['company_data'=>$company_data]);
    }

   public function medicine(Request $request)
    {
        return MedicineModel::where('medicine_code',$request->medicine_code)->first();
    }

    public function medicine_name(Request $request)
    {
        return MedicineModel::where('company_name',$request->company_name)->where('medicine_status','Active')->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report_data=PurcaseModel::join('medicine','medicine.medicine_code','=','purcase.medicine_code')->get();
        return view('Admin.Purcase.purcase_report',['report_data'=>$report_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purcase=new PurcaseModel;
        $validation=Validator::make($request->all(),$purcase->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $stock=new StockModel;
            $prev_data=$stock::where('medicine_code',$request->medicine_code)->first();
                    if($prev_data)
                    {
                        $total_stock=$prev_data->total_stock+$request->quantity;
                        $prev_data->update(['total_stock'=>$total_stock]);
                    }
                    else
                    {
                        $stock->medicine_code=$request->medicine_code;
                        $stock->total_stock=$request->quantity;
                        $stock->save();
                    }
            $request_data=$request->all();
            $request_data=array_add($request_data,'purcase_id',time());
            $purcase->fill($request_data)->save();
            Session::flash('success','New Medicine Added Into Stock');
            return back();
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
         return PurcaseModel::join('medicine','medicine.medicine_code','=','purcase.medicine_code')->where('purcase_id',$id)->first();
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
       
    }
 

   public function purcase_update(Request $request)
   {

      $purcase_data=PurcaseModel::where('purcase_id',$request->purcase_id)->first();
      $total_pay=$purcase_data->pay+$request->now_pay;
      $purcase_data->update(['pay'=>$total_pay,'rest'=>$request->rest]);
      Session::flash('success',"You Pay $request->now_pay Tk Successfully");
      return back();
   }

   public function rest_report()
   {
        $rest_data=PurcaseModel::join('medicine','medicine.medicine_code','=','purcase.medicine_code')->where('rest','>',0)->get();
        return view('Admin.Purcase.rest_report',['rest_data'=>$rest_data]);

   }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PurcaseModel::find($id)->delete();
        Session::flash('success','Successfully Deleted Purcase/Payment Information');
        return back();
    }
}
