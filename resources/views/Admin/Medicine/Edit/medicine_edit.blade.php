@extends('Admin.index')
@section('title','Medicine')
@section('breadcrumbs','Medicine')
@section('main_content')
 <div class="container">
  <!-- Trigger the modal with a button -->
   <style type="text/css">
        .create{    
             background: #666;
              float: right;
              height: 38px;
             font-size: 18px;
              width: 183px;}
        .dropdown_test li {display: inline;}
        .dropdown_test li a{padding: 10px; background: #666;color: #fff; border-radius: 5px}
        .dropdown_test li a:hover{padding: 12px; background: #666;color: #fff; border-radius: 5px}
  </style>
<div>
          <div class="panel-body text-left">
            <ul class='dropdown_test' style="margin-top: 10px;margin-left: -93px;margin-right: -95px;">
                   
          <li><a href='/admin'><i class="fas fa-tachometer-alt" aria-hidden="true"></i> &nbsp;Home</a></li>
          <li><a href='/'><i class="ti-pencil-alt2" aria-hidden="true"></i>Sub Catagory</a></li>&nbsp;
          <li><a href='/'><i class="ti-pencil-alt2" aria-hidden="true"></i>Post</a></li>&nbsp;
          <div style="float: right;">
          <li><a href='/' target="_blank"><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
          <li><a href='/'><i class="far fa-file-excel" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
          <li><a href='/'><i class="fas fa-print" aria-hidden="true"></i>&nbsp;Print</a></li>&nbsp;
          </div>
       </ul>
          </div>
   </div>
  @if(session('success'))
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('success')}}
</div>
  @endif
  @if(session('error'))
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{session('error')}}
    </div>
  @endif
  @if($errors->any())
   <div class="alert alert-danger">
        <ul  style='list-style:none;text-align: center;'>
            @foreach ($errors->all() as $error)
                <li><i class="far fa-hand-point-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif



  <!-- Modal -->
    
      <!-- Modal content-->
       {{Form::open(['url'=>"/medicine/$medicine_data->medicine_id",'method'=>'put'])}}
      <div class="modal-content">
        <div class="modal-body">

        <div class="form-group">
        <label class="control-label col-sm-6" for="company_name">Medicine Code:</label>
        <div class="col-sm-10">
         {{Form::text('medicine_code',$medicine_data->medicine_code,['class'=>'form-control','id'=>'medicine_code','title'=>'medicine_code'])}}
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-6" for="company_name">Medicine Name:</label>
        <div class="col-sm-10">
        {{Form::text('medicine_name',$medicine_data->medicine_name,['class'=>'form-control','id'=>'medicine_name','title'=>'medicine_name'])}}
        </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-6" for="company_name">Catagory:</label>
          <div class="col-sm-10">

          @php $catagory_data_array=[$medicine_data->catagory=>$medicine_data->catagory] @endphp
          @foreach($catagory_data as $catagory_data_value)
           @php
           $catagory_data_array[$catagory_data_value->catagory_name]=$catagory_data_value->catagory_name
           @endphp
          @endforeach
          {{Form::select('catagory',$catagory_data_array,null,['class'=>'form-control','id'=>'catagory','title'=>'catagory'])}}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-6" for="company_name">Company Name:</label>
          <div class="col-sm-10">
          @php $company_data_array=[$medicine_data->company_name=>$medicine_data->company_name] @endphp
          @foreach($company_data as $company_data_value)
           @php
             $company_data_array[$company_data_value->company_name]=$company_data_value->company_name
           @endphp
          @endforeach
          {{Form::select('company_name',$company_data_array,null,['class'=>'form-control','id'=>'company_name','title'=>'company_name'])}}
          </div>
        </div>

          <div class="form-group">
          <label class="control-label col-sm-6" for="company_name">Desk Name:</label>
          <div class="col-sm-10">

          @php $desk_data_array=[$medicine_data->desk_name=>$medicine_data->desk_name] @endphp
          @foreach($desk_data as $desk_data_value)
           @php
           $desk_data_array[$desk_data_value->desk_name]=$desk_data_value->desk_name
           @endphp
          @endforeach
          {{Form::select('desk_name',$desk_data_array,null,['class'=>'form-control','id'=>'desk_name','title'=>'desk_name'])}}

          </div>
        </div>

         <div class="form-group">
        <label class="control-label col-sm-6" for="company_phone">Purcase Price:</label>
        <div class="col-sm-10">
        {{Form::text('purcase_price',$medicine_data->purcase_price,['class'=>'form-control','id'=>'purcase_price','title'=>'purcase_price'])}}
        </div>
        </div>

         <div class="form-group">
        <label class="control-label col-sm-6" for="company_phone">Retail Price:</label>
        <div class="col-sm-10">
        {{Form::text('retail_price',$medicine_data->retail_price,['class'=>'form-control','id'=>'retail_price','title'=>'retail_price'])}}
        </div>
        </div>

         <div class="form-group">
        <label class="control-label col-sm-6" for="company_phone">Whole Sell Price:</label>
        <div class="col-sm-10">
        {{Form::text('whole_sell_price',$medicine_data->whole_sell_price,['class'=>'form-control','id'=>'whole_sell_price','title'=>'whole_sell_price'])}}
        </div>
        </div>


        <div class="form-group">
        <label class="control-label col-sm-6" for="company_address">Medicine Description:</label>
        <div class="col-sm-10">
        {{Form::textarea('medicine_description',$medicine_data->medicine_description,['class'=>'form-control','id'=>'medicine_description','title'=>'medicine_description','cols'=>'4','rows'=>'4'])}}
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-6" for="email">Medicine Status:</label>
        <div class="col-sm-10">
         {{Form::select('medicine_status',[$medicine_data->medicine_status=>$medicine_data->medicine_status,'Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'medicine_status'])}}
        </div>
        </div>

        </div>
        <div class="modal-footer">
          {{Form::submit('Update',['class'=>'btn btn-success'])}}
        </div>
      </div>
      {{Form::close()}}
      
    </div>
  </div>
</div>
@stop