<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyModel;
use Session;
use Validator;
use Redirect;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_data=CompanyModel::all();
        return view('Admin.Medicine.company',['company_data'=>$company_data]);
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
        $company=new CompanyModel;
        $validation=Validator::make($request->all(),$company->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            $request_data=array_add($request_data,'company_id',time());
            $company->fill($request_data)->save();
            Session::flash('success','New Company Added Successfully');
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
        $data=CompanyModel::find($id);
        if($data->company_status=='Active')
        {
            $data->update(['company_status'=>'Inactive']);
        }
        else
        {
            $data->update(['company_status'=>'Active']);
        }
        Session::flash('success','Company Status Changed');
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
        $edit_data=CompanyModel::find($id);
        return view('Admin.Medicine.Edit.company_edit',['edit_data'=>$edit_data]);
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

            CompanyModel::find($id)->fill($request->all())->save();
            Session::flash('success','Company Information Updated Successfully');
            return Redirect::to('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompanyModel::find($id)->delete();
        Session::flash('success','Company Deleted Successfully');
        return back();
    }
}
