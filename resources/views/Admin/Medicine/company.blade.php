@extends('Admin.index')
@section('title','Company')
@section('breadcrumbs','Company')
@section('main_content')
 <div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success create"  style="float: right;" data-toggle="modal" data-target="#myModal">Add New Company</button><br/><br/><br/>
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
             <ul class='dropdown_test' style="margin-top: 10px">
                   
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
       {{Form::open(['url'=>'/company','method'=>'post'])}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_name">Comapny/Brand Name:</label>
	      <div class="col-sm-10">
	      {{Form::text('company_name','',['class'=>'form-control','id'=>'company_name','title'=>'company_name'])}}
	      </div>
        </div>

         <div class="form-group">
	      <label class="control-label col-sm-6" for="company_phone">Comapny/Brand Phone:</label>
	      <div class="col-sm-10">
	      {{Form::text('company_phone','',['class'=>'form-control','id'=>'company_phone','title'=>'company_phone'])}}
	      </div>
        </div>

         <div class="form-group">
	      <label class="control-label col-sm-6" for="company_email">Comapny/Brand Email:</label>
	      <div class="col-sm-10">
	        {{Form::email('company_email','',['class'=>'form-control','id'=>'company_email','title'=>'company_email'])}}
	      </div>
        </div>

        <div class="form-group">
	      <label class="control-label col-sm-6" for="company_address">Comapny/Brand Address:</label>
	      <div class="col-sm-10">
	      {{Form::textarea('company_address','',['class'=>'form-control','id'=>'company_address','title'=>'company_address','cols'=>'4','rows'=>'4'])}}
	      </div>
        </div>
         <div class="form-group">
	      <label class="control-label col-sm-6" for="email">Comapny/Brand Address:</label>
	      <div class="col-sm-10">
	       {{Form::select('company_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'company_status'])}}
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
                            <strong class="card-title">Comapny / Brand Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Company Name</th>
                        <th>Company Phone</th>
                        <th>Compay Email</th>
                        <th>Compay Address</th>
                        <th>Compay Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       @foreach($company_data as $key=>$company_data_value)
                        <td>{{$key+1}}</td>
                        <td>{{$company_data_value->company_name}}</td>
                        <td>{{$company_data_value->company_phone}}</td>
                        <td>{{$company_data_value->company_email}}</td>
                        <td>{{$company_data_value->company_address}}</td>
                        <td>
                          @if($company_data_value->company_status=='Active')
                          <span style="color: green;">{{$company_data_value->company_status}}</span>
                          @else
                          <span style="color: red;">{{$company_data_value->company_status}}</span>
                          @endif
                         </td>
                        <td style="display: inline-flex;">
                          {{Form::open(['url'=>"/company/$company_data_value->company_id/edit",'method'=>'GET'])}}
                           {{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                          {{Form::close()}}

                          @if($company_data_value->company_status=='Active')
                          {{Form::open(['url'=>"/company/$company_data_value->company_id",'method'=>'GET'])}}
                           {{Form::submit('INACTIVE',['class'=>'btn btn-warning'])}}
                          {{Form::close()}}
                          @else
                          {{Form::open(['url'=>"/company/$company_data_value->company_id",'method'=>'GET'])}}
                           {{Form::submit('ACTIVE',['class'=>'btn btn-success'])}}
                          {{Form::close()}}
                          @endif

                          {{Form::open(['url'=>"/company/$company_data_value->company_id",'method'=>'DELETE'])}}
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