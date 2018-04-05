<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseModel;
use App\ExpenseForModel;
use Validator;
use Session;
class ExpenseFor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense_data=ExpenseModel::all();
        $expense_for_data=ExpenseForModel::all();
        return view('Admin.Expense.expense_for',['expense_data'=>$expense_data,'expense_for_data'=>$expense_for_data]);
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
        $expense_for=new ExpenseForModel;
        $validation=Validator::make($request->all(),$expense_for->rules());
        if($validation->fails())
        {
          return back()->withInput()->withErrors($validation);
        }
        else
        {
           $requested_data=$request->all();
           $requested_data=array_add($requested_data,'expense_for_id',time());
           $expense_for->fill($requested_data)->save();
           Session::flash('success',"Expense Added Cost $request->expense_cost");
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
        $expense_for_data=ExpenseForModel::find($id);
        $expense_data=ExpenseModel::all();
      return view('Admin.Expense.expense_for_edit',['expense_for_data'=>$expense_for_data,'expense_data'=>$expense_data]);
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
      $data=ExpenseForModel::where('expense_for_id',$id)->first();
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
        ExpenseForModel::find($id)->delete();
        Session::flash('success','Expense Deleted Successfully');
        return back();
    }
}
