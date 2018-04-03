@extends('Admin.index')
@section('title','Retail Sale Report')
@section('breadcrumbs','Retail Sale Report')
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
   {{Form::open(['url'=>'/whole_sale'])}}
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content invoice"  style="width: 765px;">
        <div id="printableArea">
      <div class="modal-body">
         <div class="col-sm-12">
           <div class="col-sm-6">
            <h3 style="font-family: initial;font-style: inherit;font-size:42px;">INVOICE</h3>
          </div>
          <div class="col-sm-6">
            <img src="{{asset('admin_asset/images/blood.png')}}" style="margin-top: -69px;float: right;">
          </div>
         </div>
         <div class="col-sm-12"  style="margin-top: -78px;">
              <p style="font-size: 20px;">BANGLADESH MEDICIAL HALL</p>
         </div>
         <div class="col-sm-12">
              <p style="font-size: 13px;margin-top: -53px;">ADDRESS: UKIL PARA, FENI BANGLADESH</p>
         </div>
         <br>
         <div class="invoice_data_value"></div>
           <div class="details">
              <table>
              <tr>
                  <td class="view">TOTAL</td>
                 <td>
                   <span  style="margin-left: 64px;margin-top: 2px;height: 46px;" class="total_data" name="medicine_name"></span>
                  </td>
                </tr>
                <tr>
                    <td class="view">PAYMENT</td>
                   <td>
                     <span  style="margin-left: 64px;margin-top: 2px;height: 46px;"  class="payment_data" name="medicine_name"></span>
                    </td>
                  </tr>
                </tr>
              </table>
							<div  style="margin-left: 145px;margin-top: 16px;font-size: 22px;">
								<span class="due"></span>
							</div>
           </div>
           <div class="col-sm-12" >
              <p style="text-align:center;">DEVELOPED BY :CODE BREAKERS</p>
           </div>
      </div>
    </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success"  onclick="printDiv('printableArea')">Print</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
      </div>


  <!-- for-edit -->
      <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->

          <div class="modal-content invoice"  style="width: 765px;">
              <div id="printableArea">
            <div class="modal-body">
               <div class="col-sm-12">
                 <div class="col-sm-6">
                  <h3 style="font-family: initial;font-style: inherit;font-size:42px;">INVOICE</h3>
                </div>
                <div class="col-sm-6">
                  <img src="{{asset('admin_asset/images/blood.png')}}" style="margin-top: -69px;float: right;">
                </div>
               </div>
               <div class="col-sm-12"  style="margin-top: -78px;">
                    <p style="font-size: 20px;">BANGLADESH MEDICIAL HALL</p>
               </div>
               <div class="col-sm-12">
                    <p style="font-size: 13px;margin-top: -53px;">ADDRESS: UKIL PARA, FENI BANGLADESH</p>
               </div>
               <br>
               <div class="invoice_data_value"></div>
                 <div class="details">
                    <table>
                    <tr>
                        <td class="view">TOTAL</td>
                       <td>
                         <span  style="margin-left: 64px;margin-top: 2px;height: 46px;" class="total_data" name="medicine_name"></span>
                        </td>
                      </tr>
                      <tr>
                          <td class="view">PAYMENT</td>
                         <td>
                           <span  style="margin-left: 64px;margin-top: 2px;height: 46px;"  class="payment_data" name="medicine_name"></span>
                          </td>
                       </tr>
                       <tr>
                           <td class="view">PAY</td>
                          <td>
                             <input type="text" class="form-control now_pay"/>
                           </td>
                       </tr>
                    </table>
      							<div  style="margin-left: 145px;margin-top: 16px;font-size: 22px;">
      								<span class="now_due"></span>
      							</div>
                    <div  style="margin-left: 145px;margin-top: 16px;font-size: 22px;">
                      <span class="now_due_msg_one"></span>
                    </div>
                    <div  style="margin-left: 145px;margin-top: 16px;font-size: 22px;">
                      <span class="now_due_msg"></span>
                    </div>
                 </div>
                 <div class="col-sm-12" >
                    <p style="text-align:center;margin-top: 156px;">DEVELOPED BY :CODE BREAKERS</p>
                 </div>
            </div>
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success new_pay">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
            </div>
           <!-- for-edit -->

{{Form::close()}}

   <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Whole Sale Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Invoice Id</th>
                        <th>Customer Name</th>
												<th>Total</th>
												<th>Payment</th>
                        <th>Due</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
												@foreach($retail_sale_data as $retail_sale_data_value)
                        <td>{{date('d-M-Y',strtotime($retail_sale_data_value->date))}}</td>
                        <td>{{$retail_sale_data_value->invoice_id}}</td>
                        <td>{{$retail_sale_data_value->customer_name}}</td>
												<td>{{$retail_sale_data_value->grand_total}}</td>
												<td>{{$retail_sale_data_value->payment}}</td>
												@php
									$due=$retail_sale_data_value->grand_total-$retail_sale_data_value->payment
												@endphp
                        <td>
                          @if($due==0)
                          <span style="color:green;">No Due</span>
                         @else
                           <span style="color:red;">{{$due}}</span>
                         @endif
                        </td>
                        <td style="display: inline-flex;">
             {{Form::submit('View',['class'=>'btn btn-success invoice_print','data-toggle'=>'modal','data-target'=>'#myModal','get_value'=>"$retail_sale_data_value->invoice_id"])}}
                      {{Form::open(['url'=>"/retail_sale/$retail_sale_data_value->invoice_id",'method'=>'DELETE'])}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return checkdelete()'])}}
                      {{Form::close()}}
                         {{Form::submit('Edit',['class'=>'btn btn-primary invoice_print','data-toggle'=>'modal','data-target'=>'#myModal2','get_value'=>"$retail_sale_data_value->invoice_id"])}}
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript">
     $(document).ready(function(){
       $(".new_pay").attr('disabled','disabled');
         $(".invoice_print").unbind().click(function(){
             var invoice_id=$(this).attr('get_value');
              $.ajax({
                  url:'/retail_data',
                  type:'post',
                  data:{'invoice_id':invoice_id,'_token': $('input[name=_token]').val()},
                  success:function(data){
                    console.log(data);
                    $(".invoice_data_value").html(data);
                    var total=$(".total").val();
                    var payment=$(".payment").val();
										var due=parseInt(total)-parseInt(payment);
										if(due > 0)
										{
											 $(".due").html('<font color="red">You Have '+due+' Tk Due</font>');
										}
										else {
												$(".due").html('<font color="green">You Have No Due</font>');
										}
                    $(".total_data").html(total);
                     $(".payment_data").html(payment);

                  }

              });
         });

         $(".now_pay").unbind().keyup(function(){
              $(".new_pay").removeAttr('disabled');
             var total=$(".total_data").html();
             var prev_payment=$(".payment_data").html();
             var now_pay=$(this).val();
             var now_payment=parseInt(prev_payment)+parseInt(now_pay);
             var now_due=parseInt(total)-parseInt(now_payment);
             if(now_due > 0)
               {
                  $(".now_due").html('<font color="red">You Have '+now_due+' Tk Due</font>');
               }
               else {
                   $(".now_due").html('<font color="green">You Have No Due</font>');
               }
         });


         $(".new_pay").unbind().click(function(){
              var invoice_id=$(".invoice_id").html();
              var prev_payment=$(".payment_data").html();
              var now_pay=$(".now_pay").val();
              var payment=parseInt(prev_payment)+parseInt(now_pay);
              $.ajax({
                   url:'/retail_sale_pay',
                   type:'post',
             data:{'invoice_id':invoice_id,'payment':payment,'_token': $('input[name=_token]').val()},
               success:function(data){
                 if(data)
                 {
                   $(".now_due_msg_one").html('<font color="green">Now Paid '+now_pay+' Tk </font>');
                    $(".now_due_msg").html('<font color="green">Total Paid '+payment+' Tk </font>');
                    $(".new_pay").attr('disabled','disabled');
                 }
               }

              });
         });



     });
   </script>
   <script type="text/javascript">
   function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;

       document.body.innerHTML = printContents;

       window.print();

       document.body.innerHTML = originalContents;
    }
   </script>
@stop
