<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoryModel;
use Session;
use Validator;
use Redirect;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagory_data=CatagoryModel::all();
        return view('Admin.Medicine.catagory',['catagory_data'=>$catagory_data]);
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
        $catagory=new CatagoryModel;
        $validation=Validator::make($request->all(),$catagory->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            $request_data=array_add($request_data,'catagory_id',time());
            $catagory->fill($request_data)->save();
            Session::flash('success','New Catagory Added Successfully');
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
        $catagory_data=CatagoryModel::find($id);
        if($catagory_data->catagory_status=='Active')
        {
            $catagory_data->update(['catagory_status'=>'Inactive']);
        }
        else
        {
            $catagory_data->update(['catagory_status'=>'Active']);
        }
        Session::flash('success','Catagory Status Changed');
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
        $catagory_data=CatagoryModel::find($id);
        return view('Admin.Medicine.Edit.catagory_edit',['catagory_data'=>$catagory_data]);
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
          $catagory=new CatagoryModel;
            $request_data=$request->all();
            $catagory->find($id)->fill($request_data)->save();
            Session::flash('success','Catagory Updated Successfully');
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
        CatagoryModel::find($id)->delete();
        Session::flash('success','Catagory Deleted Successfully');
        return back();

    }
}
