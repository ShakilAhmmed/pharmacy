@extends('Admin.index')
@section('title','Company')
@section('breadcrumbs','Company')
@section('main_content')
 <div class="container">
  <!-- Trigger the modal with a button -->
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

      <!-- Modal content-->
       {{Form::open(['url'=>"/company/$edit_data->company_id",'method'=>'put'])}}
      <div class="modal-content">
        <div class="modal-body">

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_name">Comapny/Brand Name:</label>
	      <div class="col-sm-10">
	      {{Form::text('company_name',$edit_data->company_name,['class'=>'form-control','id'=>'company_name','title'=>'company_name'])}}
	      </div>
        </div>

         <div class="form-group">
	      <label class="control-label col-sm-6" for="company_phone">Comapny/Brand Phone:</label>
	      <div class="col-sm-10">
	      {{Form::text('company_phone',$edit_data->company_phone,['class'=>'form-control','id'=>'company_phone','title'=>'company_phone'])}}
	      </div>
        </div>

         <div class="form-group">
	      <label class="control-label col-sm-6" for="company_email">Comapny/Brand Email:</label>
	      <div class="col-sm-10">
	        {{Form::email('company_email',$edit_data->company_email,['class'=>'form-control','id'=>'company_email','title'=>'company_email'])}}
	      </div>
        </div>

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_address">Comapny/Brand Address:</label>
	      <div class="col-sm-10">
	      {{Form::textarea('company_address',$edit_data->company_address,['class'=>'form-control','id'=>'company_address','title'=>'company_address','cols'=>'4','rows'=>'4'])}}
	      </div>
        </div>
         <div class="form-group">
	      <label class="control-label col-sm-6" for="email">Comapny/Brand Address:</label>
	      <div class="col-sm-10">
	       {{Form::select('company_status',[$edit_data->company_status=>$edit_data->company_status,'Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'company_status'])}}
	      </div>
        </div>


        </div>
        <div class="modal-footer" align="center">
          {{Form::submit('Update',['class'=>'btn btn-success'])}}
        </div>
      </div>
      {{Form::close()}}
    </div>
@stop