@extends('Admin.index')
@section('title','Retail Sale')
@section('breadcrumbs','Retail Sale')
@section('main_content')

@if(session('success'))
<div class="alert alert-success alert-dismissable" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success !</strong> {{session('success')}}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissable" align="center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error !</strong> {{session('error')}}
  </div>
@endif
<style type="text/css">
  .view{
      border: 1px solid white;
      width: 198px;
      height: 49px;
      padding: 5px;
      text-align: center;
      color: white;
      margin-left: 18px;
      background: black;
  }
  .view:hover{
    background: white;
    color: black;
  }
    .details{
      margin-top: 52px;
      float: right;
      border: 1px solid black;
      height: 260px;
      width: 436px;
  }
  .details_data
  {
    float: right;
    height: 151PX;
    width: 436px;
  }
  </style>

<div class="container">
     <!--Form Design Start-->
      <div style="display: inline-flex;">
          <div class="view" style="height: 39px;">DATE</div>
          <div class="view" style="height: 39px;">CUSTOMER  NAME</div>
      </div>

        {{Form::open(['url'=>'/whole_sale'])}}
        <script src="http://cdnjs.cloudflare.com/…/li…/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
        function readURL(input) {
        if (input.files && input.files[0])
        {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#blah')
        .attr('src', e.target.result)
        .width(200)
        .height(200);
        };
        reader.readAsDataURL(input.files[0]);
        }
        }

        $(document).ready(function() {

            var max_fields      = 10; //maximum input boxes allowed  <div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append("<div style='line-height: 40px;'>\
                      <table style='margin-top: -37px;'>\
                     <tr>\
                      <td>\
                         <select class='form-control medicine_name' name='medicine_code[]' style='margin-left: 20px;width: 194px;'>\
                          <option>--select--</option>\
                           @foreach($medicine_data as $medicine_data_value)\
                           <option value='{{$medicine_data_value->medicine_code}}'>{{$medicine_data_value->medicine_name}}</option>\
                           @endforeach\
                         </select>\
                      </td>\
                      <td>\
                         <input type='text' class='form-control price' readonly='readonly' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                       <td>\
                        <input type='text' class='form-control quantity' name='quantity[]' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      <td>\
                        <input type='text' class='form-control subtotal'  readonly='readonly' style='margin-left: 21px;width: 194px;'/>\
                      </td>\
                      </tr>\
                     <button class='btn btn-danger remove_field' style='width: 195px;margin-left: 882px;'>Remove</button>\
                     </table>\</div>"); //add input box
                }
            });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
            $(document).on('change','.medicine_name',function(){
                var medicine_code=$(this).val()
                var row = $(this).closest("tr");
               $.ajax({
                  url:'/medicine_price',
                  type:'post',
                  data:{'medicine_code':medicine_code,'_token': $('input[name=_token]').val()},
                  success:function(data){
                    if(data.total_stock >0)
                    {
                      row.find(".price").val(data.retail_price);
                      $(".msg").html("<font style='color:green;'>"+data.total_stock+" MEDICINE IN STOCK</font>");
                    }
                    else
                    {
                      $(".msg").html("<font style='color:red;'>MEDICINE IS OUT OF STOCK</font>");
                    }
                  }
               });
          });
          $(document).on('keyup','.quantity',function(){
              var price_row = $(this).closest("tr").find(".price");
              var price=parseInt(price_row.val());
              var quantity=parseInt($(this).val());
              var subtotal=parseInt(price*quantity);
              $(this).closest("tr").find(".subtotal").val(subtotal);
              var total=0;
               $(".subtotal").each(function() {
                  var value=parseInt($(this).val());
                  total=parseInt(total+value);
                  $(".grand_total").val(total);

            });
          });
        });
        </script>
        <div class="form-group">
        <div class="col-sm-2" ><!-- date('Y-m-d H:i:s') -->
            {{Form::date('date',Carbon\Carbon::now(),['class'=>'form-control date','id'=>'date','style'=>'width: 192px;margin-left: 4px;'])}}
        </div>
         <div class="col-sm-2" ><!-- date('Y-m-d H:i:s') -->
           @php $customer_array=[''=>'--select--'] @endphp
           @foreach($customer_data as $customer_data_value)
             @php
               $customer_array[$customer_data_value->customer_id]=$customer_data_value->customer_name
             @endphp
           @endforeach
            {{Form::select('customer_name',$customer_array,null,['class'=>'form-control customer_name','id'=>'customer_name','style'=>'width: 192px;margin-left: 30px;'])}}
        </div>
        </div>
        <br>
  </div>
  {{Form::close()}}
  <br>
  <div class="msg" style="float: right;margin-top: -76px;margin-right: 229px;height: 76px;width: 232px;text-align: center;"></div>
  <div class="container"  style="margin-top: 30px;">
  <div>
   <div style="display: inline-flex;">
          <div class="view" style="height: 39px;">MEDICINE NAME</div>
          <div class="view" style="height: 39px;">PRICE</div>
          <div class="view" style="height: 39px;">QUANTITY</div>
          <div class="view" style="height: 39px;">SUB TOTAL</div>
          <div class="view" style="height: 39px;">ADD MORE FILEDS</div>
    </div>
    <br>
    <table>
      <tr>
       <td>
       @php $medicine_data_array=[''=>'--select--'] @endphp
        @foreach($medicine_data as $medicine_data_value)
          @php
            $medicine_data_array[$medicine_data_value->medicine_code]=$medicine_data_value->medicine_name
          @endphp
        @endforeach
        {{Form::select('medicine_code[]',$medicine_data_array,null,['class'=>'form-control medicine_name','style'=>'margin-left: 20px;width: 194px;'])}}
      </td>
      <td>
        <input type='text' class='form-control price' readonly='readonly' style='margin-left: 21px;width: 194px;'/>
      </td>
      <td>
        <input type='text' class='form-control quantity' name="quantity[]" style='margin-left: 21px;width: 194px;'/>
      </td>
      <td>
        <input type='text' class='form-control subtotal' readonly='readonly' style='margin-left: 21px;width: 194px;'/>
      </td>
      <td>
      <button class="btn btn-success add_field_button" style="width: 196px;margin-left: 21px;">Add More Filed</button>
      </td>
     </tr>
    </table>
    <div class="input_fields_wrap"></div>
            <div class="details">

                      <table>
                      <tr>
                          <td class="view">INVOICE ID</td>
                         <td>
                         @php
                          $invoice_id=time();
                         @endphp
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" value="{{$invoice_id}}" class="form-control invoice_id" name="invoice_id" readonly="readonly">
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
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control payment" name="payment" >
                          </td>
                        </tr>
                        <tr>
                          <td class="view">DUE</td>
                         <td>
                           <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control due" readonly name="due" >
                          </td>
                        </tr>
                         <tr>
                          <td class=""></td>
                         <td>
                       {{Form::submit('Sale',['class'=>'btn btn-success submit','style'=>'margin-top: 16px;margin-left: -30px;'])}}
                          </td>
                        </tr>
                      </table>
                   </div>


  </div>
  </div>
    <div id="spin" style="text-align: center;display: none;"><img src="{{asset('images/loader.gif')}}" height="220px"></div>


</div>
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
           <div class="details_data">
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
              <div style="margin-left: 145px; margin-top: 16px;font-size: 22px;">
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
<script type="text/javascript">



  $(".submit").click(function(){
    var date=$(".date").val();
    var customer_name=$(".customer_name").val();
    var grand_total=$('.grand_total').val();
    var invoice_id=$(".invoice_id").val();
    var payment=$(".payment").val();
    var medicine_code=[];
    var quantity=[];
     $('.medicine_name').each(function(){
         medicine_code.push($(this).val());
         quantity.push($('.quantity').val());
     });
      $.ajax({
        url:'/retail_sale',
        type:'post',
        data:{'date':date,'invoice_id':invoice_id,'payment':payment,'customer_name':customer_name,'grand_total':grand_total,'medicine_code':medicine_code,'quantity':quantity,'_token': $('input[name=_token]').val()},
        success:function(data){
             $(".msg").html("<font style='color:green;font-size: 28px;'>Successfully Sale&nbsp;</font><button id='invoice_print' data-toggle='modal' data-target='#myModal' get_value="+invoice_id+"><i class='fa fa-print'></i></button>");
        }
      });
  });

$(document).on('click','#invoice_print',function(){
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
$(".payment").keyup(function(){
    var grand_total=$(".grand_total").val();
    var pay=$(this).val();
    var due=parseInt(grand_total)-parseInt(pay);
    $(".due").val(parseInt(due));
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
