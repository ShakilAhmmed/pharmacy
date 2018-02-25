@extends('Admin.index')
@section('title','Catagory')
@section('breadcrumbs','Catagory')
@section('main_content')
 <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info create"  style="float: right;margin-right: -95px;" data-toggle="modal" data-target="#myModal">Add New Desk</button><br/><br/><br/>
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
       {{Form::open(['url'=>'/desk','method'=>'post'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_name">Desk Name:</label>
	      <div class="col-sm-10">
	      {{Form::text('desk_name','',['class'=>'form-control','id'=>'desk_name','title'=>'desk_name'])}}
	      </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-6" for="company_name">Desk Code:</label>
        <div class="col-sm-10">
        {{Form::text('desk_code','',['class'=>'form-control','id'=>'desk_code','title'=>'desk_code'])}}
        </div>
        </div>

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_address">Desk Description:</label>
	      <div class="col-sm-10">
	      {{Form::textarea('desk_description','',['class'=>'form-control','id'=>'desk_description','title'=>'desk_description','cols'=>'4','rows'=>'4'])}}
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
                            <strong class="card-title">Desk Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Desk Name</th>
                        <th>Desk Code</th>
                        <th>Desk Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       @foreach($desk_data as $key=>$desk_data_value)
                        <td>{{$key+1}}</td>
                        <td>{{$desk_data_value->desk_name}}</td>
                        <td>{{$desk_data_value->desk_code}}</td>
                        <td>
                          {{$desk_data_value->desk_description}}
                         </td>
                        <td>
                          {{Form::open(['url'=>"/desk/$desk_data_value->desk_id",'method'=>'DELETE'])}}
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