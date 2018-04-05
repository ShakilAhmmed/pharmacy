<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseModel;
use Validator;
use Session;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_data=ExpenseModel::all();
        return view('Admin.Expense.expense_catagory',['expense_data'=>$expense_data]);
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
        $expense=new ExpenseModel;
        $validation=Validator::make($request->all(),$expense->rules());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation);
        }
        else
        {
           $requested_data=$request->all();
           $requested_data=array_add($requested_data,'expense_catagory_id',time());
           $expense->fill($requested_data)->save();
           Session::flash('success','New Expense Added Successfully');
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
        $expense_data=ExpenseModel::find($id);
        if($expense_data->expense_status=='Active')
        {
          $expense_data->update(['expense_status'=>'Inactive']);
        }
        else
        {
          $expense_data->update(['expense_status'=>'Active']);
        }
        Session::flash('success','Expense Catagory Status Changed Successfully');
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
       $expense_catagory_data=ExpenseModel::find($id);
       return view('Admin.Expense.expense_catagory_edit',['expense_catagory_data'=>$expense_catagory_data]);
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
        $data=ExpenseModel::where('expense_catagory_id',$id)->first();
        $data->fill($request->all())->save();
        Session::flash('success','Expense Catagory Updated Successfully');
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
        ExpenseModel::find($id)->delete();
        Session::flash('success','Expense Catagory Deleted Successfully');
        return back();
    }
}
