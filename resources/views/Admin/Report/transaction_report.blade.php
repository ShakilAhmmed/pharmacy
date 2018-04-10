@extends('Admin.index')
@section('title','Inventory Report')
@section('breadcrumbs','Inventory Report')
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
			 .paid_table_td{
									 border: 1px solid white;
									 width: 198px;
									 height: 49px;
									 padding: 5px;
									 text-align: center;
									 background: #2F2F2F;
									 color: white;
									 margin-left: 18px;
			 }
			 .paid_table_td:hover{
				 background: white;
				 color: black;
			 }
 </style>
	 @if(session('success'))
	 <div class="alert alert-success alert-dismissible">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	 <strong>Success!</strong> {{session('success')}}
	</div>
 @endif
<div>
				 <div class="panel-body text-left">
					 <ul class='dropdown_test' style="margin-top: 10px;margin-left: -93px;margin-right: -95px;">

				 <li><a href='/admin'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
				 <li><a href='/'><i class="ti-pencil-alt2" aria-hidden="true"></i>Sub Catagory</a></li>&nbsp;
				 <li><a href='/'><i class="ti-pencil-alt2" aria-hidden="true"></i>Post</a></li>&nbsp;
				 <div style="float: right;">
				 <li><a href='/' target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Pdf</a></li>&nbsp;
				 <li><a href='/'><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;Excel</a></li>&nbsp;
				 <li><a href='/'><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</a></li>&nbsp;
				 </div>
			</ul>
				 </div>
	</div>
	</div>
	<style type="text/css">
		.view{
			border: 1px solid white;
			width: 198px;
			height: 49px;
			padding: 5px;
			text-align: center;
			background: #2F2F2F;
			color: white;
			margin-left: 18px;
		}
		.view:hover{
			background: white;
			color: black;
		}
		.details{
			float: right;
			height: 151PX;
			width: 436px;
		}
	</style>
	<div class="content mt-3">
					 <div class="animated fadeIn">
							 <div class="row">
									<div class="col-md-12">
									 <div class="card">
											 <div class="card-header">
													 <strong class="card-title">Inventory Data Table</strong>
											 </div>
											 <div class="card-body">
								 <table id="bootstrap-data-table" class="table table-striped table-bordered">
									 <thead>
										 <tr>
											 <th>Sl No</th>
											 <th>Date</th>
											 <th>Whole Sale Cost</th>
											 <th>Whole Sale Payment</th>
											 <th>Retail Sale Cost</th>
											 <th>Retail Sale Payment</th>
											 <th>Due</th>
											 <th>Expense</th>
											 <th>Expected Cash</th>
											 <th>Incash</th>
										 </tr>
									 </thead>
									 <tbody>

										<tr>
											@foreach($transaction_data as $key=>$transaction_data_value)
										  	<td>{{$key+1}}</td>
											  <td>{{date('d-M-Y',strtotime($transaction_data_value->date))}}</td>
												<td>{{$transaction_data_value->whole_sale_cost}}</td>
												<td>{{$transaction_data_value->whole_sale_payment}}</td>
												<td>{{$transaction_data_value->retail_sale_cost}}</td>
												<td>{{$transaction_data_value->retail_sale_payment}}</td>
												<td>{{$transaction_data_value->due}}</td>
												<td>{{$transaction_data_value->expense}}</td>
												<td>{{$transaction_data_value->cash}}</td>
												<td>{{$transaction_data_value->in_cash}}</td>
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
