@extends('Admin.index')
@section('title','Customer')
@section('breadcrumbs','Customer')
@section('main_content')
<div class="container">
  <div style="border: 1px solid black;width: 502px;color: white;background: red; height: 28px;margin-left: -100px;">!SYSTEM WILL GENERATE MEMBER PHONE NUMBER AS CODE</div>
 <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-info create"  style="float: right;margin-right: -95px;" data-toggle="modal" data-target="#myModal">Add New Customer</button><br/><br/><br/>
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
				 <li><a href='/desk'><i class="ti-pencil-alt2" aria-hidden="true"></i>Desk</a></li>&nbsp;
				 <li><a href='/medicine'><i class="ti-pencil-alt2" aria-hidden="true"></i>Medcine</a></li>&nbsp;
				 <div style="float: right;">
				 <li><a href='/catagory_pdf' target="_blank"><i class="far fa-file-pdf" aria-hidden="true"></i>Pdf</a></li>&nbsp;
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
			{{Form::open(['url'=>'/customer','method'=>'post'])}}
		 <div class="modal-content">
			 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal">&times;</button>
			 </div>
			 <div class="modal-body">
			 <div class="form-group">
			 <label class="control-label col-sm-6" for="company_name">Customer Name:</label>
			 <div class="col-sm-10">
			 {{Form::text('customer_name','',['class'=>'form-control','id'=>'customer_name','title'=>'customer_name'])}}
			 </div>
			 </div>

			 <div class="form-group">
			<label class="control-label col-sm-6" for="company_name">Customer Phone:</label>
				<div class="col-sm-10">
				{{Form::text('customer_phone','',['class'=>'form-control','id'=>'customer_phone','title'=>'customer_phone'])}}
				</div>
			</div>

			 <div class="form-group">
			 <label class="control-label col-sm-6" for="company_address">Customer Address:</label>
			 <div class="col-sm-10">
			 {{Form::textarea('customer_address','',['class'=>'form-control','id'=>'customer_address','title'=>'customer_address','cols'=>'4','rows'=>'4'])}}
			 </div>
			 </div>
				<div class="form-group">
			 <label class="control-label col-sm-6" for="email">Customer Status:</label>
			 <div class="col-sm-10">
				{{Form::select('customer_status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class'=>'form-control','title'=>'customer_status'])}}
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
													 <strong class="card-title">Customer Data Table</strong>
											 </div>
											 <div class="card-body">
								 <table id="bootstrap-data-table" class="table table-striped table-bordered">
									 <thead>
										 <tr>
											 <th>Sl No</th>
											 <th>Customer Name</th>
                       <th>Customer Phone</th>
											 <th>Customer Address</th>
											 <th>Customer Status</th>
											 <th>Action</th>
										 </tr>
									 </thead>
									 <tbody>
										 <tr>
                       @foreach($customer_data as $key=>$customer_data_value)
											 <td>{{$key+1}}</td>
											 <td>{{$customer_data_value->customer_name}}</td>
                       <td>{{$customer_data_value->customer_phone}}</td>
											 <td>{{$customer_data_value->customer_address}}</td>
											 <td>
                         @if($customer_data_value->customer_status=='Active')
												 <span style="color: green;">{{$customer_data_value->customer_status}}</span>
                         @else
                         <span style="color: red;">{{$customer_data_value->customer_status}}</span>
                         @endif
												</td>
											 <td style="display: inline-flex;">
                         {{Form::open(['url'=>"/customer/$customer_data_value->customer_id/edit",'method'=>'GET'])}}
													{{Form::submit('EDIT',['class'=>'btn btn-primary'])}}
                         {{Form::close()}}

                       @if($customer_data_value->customer_status=='Active')
                       {{Form::open(['url'=>"/customer/$customer_data_value->customer_id",'method'=>'GET'])}}
													{{Form::submit('INACTIVE',['class'=>'btn btn-warning'])}}
                        {{Form::close()}}
                       @else
                       {{Form::open(['url'=>"/customer/$customer_data_value->customer_id",'method'=>'GET'])}}
                       {{Form::submit('ACTIVE',['class'=>'btn btn-success'])}}
                       {{Form::close()}}
                       @endif
                          {{Form::open(['url'=>"/customer/$customer_data_value->customer_id",'method'=>'DELETE'])}}
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
