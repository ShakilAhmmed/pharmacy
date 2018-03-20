@extends('Admin.index')
@section('title','Medicine')
@section('breadcrumbs','Medicine')
@section('main_content')
 <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info create"  style="float: right;margin-right: -95px;" data-toggle="modal" data-target="#myModal">Add New Medicine</button><br/><br/><br/>
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
          <li><a href='/company'><i class="ti-pencil-alt2" aria-hidden="true"></i>Company</a></li>&nbsp;
          <li><a href='/catagory'><i class="ti-pencil-alt2" aria-hidden="true"></i>Catagory</a></li>&nbsp;
          <li><a href='/catagory'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
       {{Form::open(['url'=>'/medicine','method'=>'post'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

        <div class="form-group">
        <label class="control-label col-sm-6" for="company_name">Medicine Code:</label>
        <div class="col-sm-10">
        {{Form::text('medicine_code','',['class'=>'form-control','id'=>'medicine_code','title'=>'medicine_code'])}}
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-6" for="company_name">Medicine Name:</label>
        <div class="col-sm-10">
        {{Form::text('medicine_name','',['class'=>'form-control','id'=>'medicine_name','title'=>'medicine_name'])}}
        </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-6" for="company_name">Catagory:</label>
          <div class="col-sm-10">

          @php $catagory_data_array=[''=>'--select--'] @endphp
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
          @php $company_data_array=[''=>'--select--'] @endphp
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

          @php $desk_data_array=[''=>'--select--'] @endphp
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
        {{Form::text('purcase_price','',['class'=>'form-control','id'=>'purcase_price','title'=>'purcase_price'])}}
        </div>
        </div>

         <div class="form-group">
        <label class="control-label col-sm-6" for="company_phone">Retail Price:</label>
        <div class="col-sm-10">
        {{Form::text('retail_price','',['class'=>'form-control','id'=>'retail_price','title'=>'retail_price'])}}
        </div>
        </div>

         <div class="form-group">
        <label class="control-label col-sm-6" for="company_phone">Whole Sell Price:</label>
        <div class="col-sm-10">
        {{Form::text('whole_sell_price','',['class'=>'form-control','id'=>'whole_sell_price','title'=>'whole_sell_price'])}}
        </div>
        </div>


        <div class="form-group">
        <label class="control-label col-sm-6" for="company_address">Medicine Description:</label>
        <div class="col-sm-10">
        {{Form::textarea('medicine_description','',['class'=>'form-control','id'=>'medicine_description','title'=>'medicine_description','cols'=>'4','rows'=>'4'])}}
        </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-6" for="email">Medicine Status:</label>
        <div class="col-sm-10">
         {{Form::select('medicine_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'medicine_status'])}}
        </div>
        </div>

        </div>
        <div class="modal-footer">
          {{Form::submit('Save',['class'=>'btn btn-success','style'=>'margin-right: 332px;'])}}
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      {{Form::close()}}
      
    </div>
  </div>
</div>
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Medicine Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Medicine Name</th>
                        <th>Medicine Code</th>
                        <th>Catagory</th>
                        <th>Company</th>
                        <th>Desk</th>
                        <th>Purcase Price</th>
                        <th>Retail Price</th>
                        <th>Whole Sell Price</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       @foreach($medicine_data as $key=>$medicine_data_value)
                        <td>{{$key+1}}</td>
                        <td>{{$medicine_data_value->medicine_name}}</td>
                        <td>{{$medicine_data_value->medicine_code}}</td>
                        <td>{{$medicine_data_value->catagory}}</td>
                        <td>{{$medicine_data_value->company_name}}</td>
                        <td>{{$medicine_data_value->desk_name}}</td>
                        <td>{{$medicine_data_value->purcase_price}}</td>
                        <td>{{$medicine_data_value->retail_price}}</td>
                        <td>{{$medicine_data_value->whole_sell_price}}</td>
                        <td>
                          @if($medicine_data_value->medicine_status=='Active')
                          <span style="color: green;">{{$medicine_data_value->medicine_status}}</span>
                          @else
                           <span style="color: red;">{{$medicine_data_value->medicine_status}}</span>
                          @endif
                        </td>
                        <td style="display: inline-flex;">
                          {{Form::open(['url'=>"/medicine/$medicine_data_value->medicine_id/edit",'method'=>'GET'])}}
                           {{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                          {{Form::close()}}

                          @if($medicine_data_value->medicine_status=='Active')
                          {{Form::open(['url'=>"/medicine/$medicine_data_value->medicine_id",'method'=>'GET'])}}
                           {{Form::submit('INACTIVE',['class'=>'btn btn-warning'])}}
                          {{Form::close()}}
                          @else
                          {{Form::open(['url'=>"/medicine/$medicine_data_value->medicine_id",'method'=>'GET'])}}
                           {{Form::submit('ACTIVE',['class'=>'btn btn-success'])}}
                          {{Form::close()}}
                          @endif


                          {{Form::open(['url'=>"/medicine/$medicine_data_value->medicine_id",'method'=>'DELETE'])}}
                           {{Form::submit('DELETE',['class'=>'btn btn-danger','onclick'=>'return checkdelete()'])}}
                          {{Form::close()}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
     </div>
     </div>
     </div>
@stop