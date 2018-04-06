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
											 <th>Medicine Name</th>
											 <th>Company Name</th>
											 <th>Medicine Code</th>
											 <th>Total Purcase</th>
											 <th>Total Stock</th>
											 <th>Purcase Price</th>
											 <th>Whole Sale Price</th>
											 <th>Whole Sale Profit</th>
											 <th>Retail Sale Price</th>
											 <th>Retail Sale Profit</th>
										 </tr>
									 </thead>
									 <tbody>

										<tr>
											@foreach($inventory_data as $value)
                        @php
									$medicine_data=DB::table('medicine')->where('medicine_code',$value->medicine_code)->first();
												@endphp
											@if($medicine_data)
												<td>{{$medicine_data->medicine_name}}</td>
												<td>{{$medicine_data->company_name}}</td>
												<td>{{$medicine_data->medicine_code}}</td>
												<td>{{$value->total_quantity}}</td>
												<td>
                          @php
                 $stock_data=DB::table('stock')->where('medicine_code',$value->medicine_code)->first();
													@endphp
                          {{$stock_data->total_stock}}
												</td>
												<td>{{$medicine_data->purcase_price}}</td>
												<td>{{$medicine_data->whole_sell_price}}</td>
												<td>
													@php
                          $purcase_total=$medicine_data->purcase_price * $value->total_quantity;
													$whole_sale_total=$medicine_data->whole_sell_price * $value->total_quantity;
													$whole_sale_profit=$whole_sale_total-$purcase_total;
													@endphp
													@if($whole_sale_profit<= 0)
													    <span style="color:red;">Loss : {{$whole_sale_profit}}</span>
												  @else
													   <span style="green;">{{$whole_sale_profit}}</span>
													@endif
												</td>
												<td>{{$medicine_data->retail_price}}</td>
												<td>
													@php
													$retail_sale_total=$medicine_data->retail_price * $value->total_quantity;
													$retail_sale_profit=$retail_sale_total-$purcase_total;
													@endphp
													@if($retail_sale_profit< 0)
															<span style="color:red;">Loss : {{$retail_sale_profit}}</span>
													@else
														 <span style="green;">{{$retail_sale_profit}}</span>
													@endif
												</td>
											 @endif
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
