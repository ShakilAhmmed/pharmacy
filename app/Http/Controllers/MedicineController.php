<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyModel;
use App\CatagoryModel;
use App\DeskModel;
use App\MedicineModel;
use Session;
use Validator;
use Redirect;
class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagory_data=CatagoryModel::where('catagory_status','Active')->get();
        $company_data=CompanyModel::where('company_status','Active')->get();
        $desk_data=DeskModel::all();
        $medicine_data=MedicineModel::all();
        return view('Admin.Medicine.medicine',['company_data'=>$company_data,'catagory_data'=>$catagory_data,'desk_data'=>$desk_data,'medicine_data'=>$medicine_data]);
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
        $medicine=new MedicineModel;
        $validation=Validator::make($request->all(),$medicine->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            $request_data=array_add($request_data,'medicine_id',time());
            $medicine->fill($request_data)->save();
            Session::flash('success','New Medicine Added Successfully');
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
        $medicine_data=MedicineModel::find($id);
        if($medicine_data->medicine_status=='Active')
        {
            $medicine_data->update(['medicine_status'=>'Inactive']);
        }
        else
        {
            $medicine_data->update(['medicine_status'=>'Active']);
        }
        Session::flash('success',"$medicine_data->medicine_name 's Status Changed");
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catagory_data=CatagoryModel::where('catagory_status','Active')->get();
        $company_data=CompanyModel::where('company_status','Active')->get();
        $desk_data=DeskModel::all();
        $medicine_data=MedicineModel::find($id);
        return view('Admin.Medicine.Edit.medicine_edit',['company_data'=>$company_data,'catagory_data'=>$catagory_data,'desk_data'=>$desk_data,'medicine_data'=>$medicine_data]);
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
            $medicine=MedicineModel::find($id);
            $medicine->first()->fill($request->all())->save();
            Session::flash('success',"$medicine->medicine_name 's Information Updated Successfully");
            return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicineModel::find($id)->delete();
        Session::flash('success','Medicine Deleted Successfully');
        return back();
    }
}
