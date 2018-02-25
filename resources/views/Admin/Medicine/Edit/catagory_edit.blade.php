@extends('Admin.index')
@section('title','Catagory')
@section('breadcrumbs','Catagory')
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
       {{Form::open(['url'=>"/catagory/$catagory_data->catagory_id",'method'=>'put'])}}
      <div class="modal-content">
        <div class="modal-body">

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_name">Catagory Name:</label>
	      <div class="col-sm-10">
	      {{Form::text('catagory_name',$catagory_data->catagory_name,['class'=>'form-control','id'=>'catagory_name','title'=>'catagory_name'])}}
	      </div>
        </div>

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_address">Catagory Description:</label>
	      <div class="col-sm-10">
	      {{Form::textarea('catagory_description',$catagory_data->catagory_description,['class'=>'form-control','id'=>'catagory_description','title'=>'catagory_description','cols'=>'4','rows'=>'4'])}}
	      </div>
        </div>
         <div class="form-group">
	      <label class="control-label col-sm-6" for="email">Catagory Status:</label>
	      <div class="col-sm-10">
	       {{Form::select('catagory_status',[$catagory_data->catagory_status=>$catagory_data->catagory_status,'Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'catagory_status'])}}
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