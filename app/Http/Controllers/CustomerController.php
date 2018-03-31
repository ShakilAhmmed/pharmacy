<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;
use Session;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_data=CustomerModel::all();
        return view('Admin.Customer.customer',['customer_data'=>$customer_data]);
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
        $customer=new CustomerModel;
        $validation=Validator::make($request->all(),$customer->rules());
        if($validation->fails())
        {
          return back()->withInput()->withErrors($validation);
        }
        else
        {
          $request_data=$request->all();
          $request_data=array_add($request_data,'customer_id',time());
          $customer->fill($request_data)->save();
          Session::flash('success','New Customer Added Successfully');
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
        $customer_data=CustomerModel::find($id);
        if($customer_data->customer_status=='Active')
        {
          $customer_data->update(['customer_status'=>'Inactive']);
        }
        else
        {
         $customer_data->update(['customer_status'=>'Active']);
        }
        Session::flash('success','Customer Status Changed Updated');
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
        $edit_customer=CustomerModel::find($id);
        return view('Admin.Customer.Edit.customer_edit',['edit_customer'=>$edit_customer]);
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
       $customer=new CustomerModel;
       $validation=Validator::make($request->all(),$customer->rules());
       if($validation->fails())
       {
         return back()->withInput()->withErrors($validation);
       }
       else
       {
         $customer::find($id)->fill($request->all())->save();
         Session::flash('success','Customer Informationn Updated Successfully');
         return back();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerModel::find($id)->delete();
        Session::flash('success','Customer Deleted Successfully');
        return back();
    }
}
