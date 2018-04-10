@extends('Admin.index')
@section('title','Regular Transaction')
@section('breadcrumbs','Regular Transaction')
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
	{{Form::open(['url'=>'/transaction'])}}
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
	{{Form::close()}}
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
	<center>
	<div class="widget-box">
     <div style="display: inline-flex;">
          <div class="view" style="height: 39px;">DATE</div>
          <div class="view" style="height: 39px;">VIEW</div>
    </div>
    <br>
    <table class='parent_class'>
    <tr>
     <td>

     {{Form::date('date',date('Y-m-d'),['class'=>'form-control date','id'=>'date','style'=>'width: 198px;'])}}
    </td>
    <td>

    <td>
    <button class="btn btn-success show" style="width: 184px;margin-left: 21px;">VIEW</button>
    </td>
   </tr>
  </table>
  </div>
</center>


	    <!-- Modal content-->
					<div class="transaction_data"></div>
					<div class="transaction_data_error" style="text-align:center;font-size: 50px;"></div>
					<div class="data_error" style="text-align:center;font-size: 50px;"></div>
				<div class="widget-box save" style="display:none;">
				<div style="float: right;margin-right: 10%;">
					<div style="display: inline-flex;">
							 <div class="view" style="height: 39px;">IN CASH</div>
							 <div class="view" style="height: 39px;">SAVE</div>
				 </div>
				 <table class='parent_class'>
				 <tr>
					<td>
					{{Form::text('in_cash','',['class'=>'form-control in_cash','id'=>'in_cash','style'=>'width: 198px;    margin-left: 20px;'])}}
				 </td>
				 <td>
				 <td>
					 <button class="btn btn-success transaction_save" style="width: 194px;margin-left: 18px;">SAVE</button>
				 </td>
				</tr>
			 </table>
		 </div>
		 </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
			$(".show").unbind().click(function(){
				  var date=$(".date").val();
					$.ajax({
						 url:'/transaction',
						 type:'post',
						 data:{'date':date,'_token': $('input[name=_token]').val()},
						 success:function(data){

                 $(".transaction_data").html(data);
								 $(".transaction_data_error").hide();
								 $(".save").show();
						 },
						 error:function(r){
                $(".transaction_data_error").html("<font color='red'>No Data Found</font>");
								$(".save").hide();
						 }
					});
			});

			$(".transaction_save").unbind().click(function(){
				  var date=$(".date").val();
					var whole_sale_cost=$(".whole_sale_cost").html();
					var whole_sale_payment=$(".whole_sale_payment").html();
					var retail_sale_cost=$(".retail_sale_cost").html();
					var retail_sale_payment=$(".retail_sale_payment").html();
					var expense=$(".expense").html();
					var cash=$(".cash").html();
					var due=$(".due").html();
					var in_cash=$(".in_cash").val();
					$.ajax({
						url:'/transaction_save',
						type:'post',
						data:{'date':date,'whole_sale_cost':whole_sale_cost,'whole_sale_payment':whole_sale_payment,'retail_sale_cost':retail_sale_cost,'retail_sale_payment':retail_sale_payment,'expense':expense,'cash':cash,'due':due,'in_cash':in_cash,'_token': $('input[name=_token]').val()},
						success:function(data){
               $(".data_error").html("<font color='green'>"+data+"</font>");
						}
					});
			});

		});
	</script>

@stop
