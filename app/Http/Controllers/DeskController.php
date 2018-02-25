<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeskModel;
use Session;
use Validator;


class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desk_data=DeskModel::all();
        return view('Admin.Medicine.desk',['desk_data'=>$desk_data]);
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
        $desk=new DeskModel;
        $validation=Validator::make($request->all(),$desk->rules());
        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $request_data=$request->all();
            $request_data=array_add($request_data,'desk_id',time());
            $desk->fill($request_data)->save();
            Session::flash('success','New Desk Added');
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
        DeskModel::find($id)->delete();
        Session::flash('success','Desk Deleted Successfully');
        return back();
    }
}
