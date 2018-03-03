@extends('Admin.index')
@section('title','Purcase')
@section('breadcrumbs','New Purcase')
@section('main_content')
 <div class="container">
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
	    border: 1px solid black;
	    height: 422px;
	    width: 436px;
 	}
 	.message{
 		    float: right;
		    border: 1px solid;
		    height: 84px;
		    width: 242px;
		    background: red;
		    text-align: center;
		    color: white;
 	}

 </style>
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
   {{Form::open(['url'=>'/purcase','method'=>'post'])}}
 <div style="display: inline-flex;">
     <div class="view">DATE(M-D-Y)</div>
     <div class="view">COMPANY NAME</div>
	 <div class="view">MEDICINE NAME</div>
 </div>
 <div class="message" style="display: none;">!WARNING NO DATA FOUND</div>
 <div class="message" id="msg" style="display: none;">!PLEASE SELECT QUANTITY</div>
 <div class="message" id="msg2" style="display: none;">!PLEASE SELECT YOUR PAYMENT</div>
 <div style="display: -webkit-box;">
         <div class="form-group">
	      <div class="col-sm-2"><!-- date('Y-m-d H:i:s') -->
           {{Form::date('date',Carbon\Carbon::now(),['class'=>'form-control date','style'=>'width: 200px;'])}}
	      </div>
        </div>
         <div class="form-group">
	      <div class="col-sm-2">
	      @php $company_data_array=[''=>'--select--'] @endphp
	      @foreach($company_data as $company_data_value)
	        @php
	         $company_data_array[$company_data_value->company_name]=$company_data_value->company_name
	        @endphp
	      @endforeach
	     {{Form::select('company_name',$company_data_array,null,['class'=>'form-control company_name','title'=>'company_name','style'=>'width: 200px;margin-left:-14px;'])}}
	      </div>
        </div>

      <div class="form-group">
	      <div class="col-sm-2">
            {{Form::select('medicine_name',[''=>'--select company--'],null,['class'=>'form-control medicine_name','style'=>'width: 200px;margin-left:-10px;'])}}
	      </div>
        </div>
    </div>
  </div>
  <div id="spin" style="text-align: center;display: none;"><img src="{{asset('admin_asset/images/loader.gif')}}" height="220px"></div>
  <div style="display: none;" id="tb">
  <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Purcase</strong>
                        </div>
                        <div class="card-body">
                  <table id="" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Medicine Name</th>
                        <th>Medicine Code</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="medicine"></td>
                        <td class="code"></td>
                        <td>
                        <input type="text" name="" style="width: 76px;" value="1" class="form-control value_data"></td>
                        <td><input type="text" name="" style="width: 76px;" class="form-control price" readonly="readonly"></td>
                        <td class="ammount"></td>
                      </tr>
                    </tbody>
                  </table>
                   <div class="details">
               
                      <table>
                      <tr>
                          <td class="view">MEDICINE NAME</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control m_name" name="medicine_name" readonly="readonly">
                          </td>
                        </tr>
                        <tr>
                          <td class="view">MEDICINE CODE</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control m_code" name="medicine_code" readonly="readonly">
                          </td>
                        </tr>
                      	<tr>
                      		<td class="view">QUANTITY</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control qty" name="quantity" readonly="readonly">
                          </td>
                      	</tr>
                      	<tr>
                      		<td class="view">SUBTOTAL</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control sub_total" name="sub_total" readonly="readonly">
                          </td>
                      	</tr>
                        <tr>
                      		<td class="view">GRANDTOTAL</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control grand_total" name="grand_total" readonly="readonly">
                          </td>
                      	</tr>
                        <tr>
                          <td class="view">PAY</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control pay" name="pay" >
                          </td>
                        </tr>
                         <tr>
                          <td class="view">THE REST</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control rest" name="rest" readonly="readonly">
                          </td>
                        </tr>
                      	 <tr>
                      		<td class=""></td>
                         <td>
                       {{Form::submit('Save To Stock',['class'=>'btn btn-success submit','style'=>'margin-top: 16px;margin-left: -30px;'])}}
                          </td>
                      	</tr>
                      </table>
                   </div>
                        </div>
                    </div>
                </div>
     </div>
     </div>
     </div>
     {{Form::close()}}
     </div>
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script type="text/javascript">
     	$(document).ready(function(){

            $(".company_name").unbind().change(function(){
                  var company_name=$(this).val();
                  $.ajax({
                  	url:'/medicine_name',
                  	type:'post',
                  	data:{'company_name':company_name,'_token': $('input[name=_token]').val()},
                  	success:function(data)
                  	{

                  		if(data[0])
                  		{
                        $('.medicine_name').html('');
                  		  $('.medicine_name').append('<option>--select--</option>');
                  		 for(var i=0;i<=data.length;i++)
                  		 {
                          $(".medicine_name").append('<option value='+data[i].medicine_code+'>'+data[i].medicine_name+'</option>');
                         }
                  		}
                  	}
                  });
            });


     		 $(".medicine_name").unbind().change(function(){
     		 	$("#spin").show();
     		 	var medicine_code=$(".medicine_name").val();
          var quantity=$(".value_data").val();

     		     $.ajax({
                    url:'/medicine_data',
                    type:'post',
                    data:{'medicine_code':medicine_code,'_token': $('input[name=_token]').val()},
                    success:function(data){
                    	if(data)
                    	{
                    		$("#tb").fadeIn(2000);
                    		$("#spin").hide();
                    		$(".message").hide();
                    		$(".medicine").html(data.medicine_name);
                        $(".m_name").val(data.medicine_name);
                        $(".m_code").val(data.medicine_code);
                        $(".qty").val(quantity);
                    		$(".code").html(data.medicine_code);
                        $(".price").val(data.purcase_price);
                        $(".ammount").html(data.purcase_price*quantity);
                        $(".sub_total").val(data.purcase_price*quantity);
                        $(".grand_total").val(data.purcase_price*quantity);
                    	}
                    	else
                    	{
                    		
                    		$(".message").fadeIn(2000);
                    		$("#tb").hide();
                    	}
                    }
                });
     		 });

         $(".value_data").unbind().keyup(function(){
             var quantity=$(this).val();
             var price=$(".price").val();
             if(quantity.length==0)
             {
                //alert('Please Put Quantity');
                $(".ammount").html('');
                $("#msg").fadeIn(2000);
                $(".sub_total").val('');
                $(".grand_total").val('');
                $(".qty").val('');
                $(".submit").attr('disabled','disabled');
             }
             else
             {
               var ammount=parseInt(quantity)*parseInt(price);
               $(".ammount").html(ammount);
               $("#msg").hide();
               $(".qty").val(quantity);
               $(".sub_total").val(ammount);
               $(".grand_total").val(ammount);
               $(".submit").removeAttr('disabled');
             }
         });
         $(".pay").unbind().keyup(function(){
             var pay=$(this).val();
             var grand_total=$(".grand_total").val();
             var rest=parseInt(grand_total)-parseInt(pay);
             $(".rest").val(rest);
             if(pay.length==0)
             {
                $("#msg2").fadeIn(2000);
                $(".submit").attr('disabled','disabled');
             }
             else
             {
               $("#msg2").hide();
               $(".submit").removeAttr('disabled');
             }
         });
     	});
     </script>
@stop