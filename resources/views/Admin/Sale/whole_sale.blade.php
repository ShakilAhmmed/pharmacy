@extends('Admin.index')
@section('title','Whole Sale')
@section('breadcrumbs','Whole Sale')
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
  </style>

<div class="container">
     <!--Form Design Start-->
      <div style="display: inline-flex;">
          <div class="view" style="height: 39px;">DATE</div>
          <div class="view" style="height: 39px;">PATIENT  NAME</div>
      </div>
     
        {{Form::open(['url'=>'/whole_sale'])}}
        <div class="form-group">
        <div class="col-sm-2" ><!-- date('Y-m-d H:i:s') -->
            {{Form::date('date',Carbon\Carbon::now(),['class'=>'form-control date','id'=>'date','style'=>'width: 192px;margin-left: 4px;'])}}
        </div>
         <div class="col-sm-2" ><!-- date('Y-m-d H:i:s') -->
            {{Form::text('patient_name','',['class'=>'form-control patient_name','id'=>'patient_name','style'=>'width: 192px;margin-left: 30px;'])}}
        </div>
        </div>
        <br>
  </div>
  <br>
  <div class="msg" style="float: right;margin-top: -76px;margin-right: 229px;height: 76px;width: 232px;text-align: center;"></div>
  <div class="container">
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
        {{Form::select('medicine_name',$medicine_data_array,null,['class'=>'form-control medicine_name','style'=>'margin-left: 20px;width: 194px;'])}}
      </td>
      <td>
        <input type='text' class='form-control price' readonly='readonly' style='margin-left: 21px;width: 194px;'/>
      </td>
      <td>
        <input type='text' class='form-control quantity' style='margin-left: 21px;width: 194px;'/>
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
    
     
   
  </div>
  </div>
    <div id="spin" style="text-align: center;display: none;"><img src="{{asset('images/loader.gif')}}" height="220px"></div>

     
</div>

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
                 <select class='form-control medicine_name' style='margin-left: 20px;width: 194px;'>\
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
                <input type='text' class='form-control quantity'  style='margin-left: 21px;width: 194px;'/>\
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
            if(data)
            {
              row.find(".price").val(data.whole_sell_price);
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
  });

});


</script>

@stop