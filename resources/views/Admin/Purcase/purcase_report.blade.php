@extends('Admin.index')
@section('title','Purcase Report')
@section('breadcrumbs','Purcase Report')
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
   </div>
   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
{{Form::open(['url'=>"/purcase_update",'method'=>'post'])}}
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      <div class="paid_table">
         <table>
          <tr>
             <td></td>
             <td>
               <input hidden="hidden" style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control purcase_id" name="purcase_id">
             </td>
           </tr>

           <tr>
             <td class="paid_table_td">PURCASE DATE</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control purcase_date" name="purcase_date" readonly="readonly">
             </td>
           </tr>
            <tr>
             <td class="paid_table_td">COMPANY NAME</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control company_name" name="company_name" readonly="readonly">
             </td>
           </tr>
            <tr>
             <td class="paid_table_td">MEDICINE NAME</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control medicine_name" name="medicine_name" readonly="readonly">
             </td>
           </tr>
            <tr>
             <td class="paid_table_td">MEDICINE CODE</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control medicine_code" name="medicine_code" readonly="readonly">
             </td>
           </tr>
            <tr>
             <td class="paid_table_td">GRAND TOTAL</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control grand_total" name="grand_total" readonly="readonly">
             </td>
           </tr>
            <tr>
             <td class="paid_table_td">PAY</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control pay" name="pay" readonly="readonly">
             </td>
           </tr>
            <tr>
             <td class="paid_table_td">THE REST</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control the_rest" name="rest" readonly="readonly">
             </td>
           </tr>
           <tr>
             <td class="paid_table_td">NOW PAY</td>
             <td>
               <input  style="margin-left: -2px;margin-top: 2px;height: 46px;" type="text" class="form-control now_pay" name="now_pay">
             </td>
           </tr>
         </table>
         </div>
      </div>
      <div class="modal-footer">
       {{Form::submit('PAY NOW',['class'=>'btn btn-success submit'])}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  {{Form::close()}}
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
                        <th>Purcase Date</th>
                        <th>Company Name</th>
                        <th>Medcine Name</th>
                        <th>Quantity</th>
                        <th>Payment Information</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($report_data as $report_data_value)
                      <tr>
                        <td>{{$report_data_value->date}}</td>
                        <td>{{$report_data_value->company_name}}</td>
                        <td>{{$report_data_value->medicine_name}}</td>
                        <td>{{$report_data_value->quantity}}</td>
                        <td>
                           <table class="table table-striped table-bordered">
                              <tr>
                                 <td>Grand Total</td>
                                 <td>{{$report_data_value->grand_total}}</td>
                              </tr>
                              <tr>
                                 <td>Pay</td>
                                 <td>{{$report_data_value->pay}}</td>
                              </tr>
                              <tr>
                                 <td>Rest</td>
                                 <td>{{$report_data_value->rest}}</td>
                              </tr>
                           </table>
                        </td>
                        <td>
                        @if($report_data_value->rest>0)
                          <span style="color: red;">You Have {{$report_data_value->rest}} Tk Rest</span>
                        @else
                          <span style="color: green;">You Have No Rest</span>
                        @endif
                         </td>
                        <td style="display: inline-flex;">
                         @if($report_data_value->rest>0)
                           {{Form::submit('PAY NOW',['class'=>'btn btn-success pay_now','data-toggle'=>'modal','data-target'=>'#myModal','get_value'=>$report_data_value->purcase_id])}}
                         @else
                           {{Form::submit('NO REST',['class'=>'btn btn-warning'])}}
                        @endif


                          {{Form::open(['url'=>"/purcase/$report_data_value->purcase_id",'method'=>'DELETE'])}}
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $(".pay_now").unbind().click(function(){
         var purcase_id=$(this).attr('get_value');
         $.ajax({
             url:'/purcase/'+purcase_id+'/edit',
             type:'GET',
             data:{'_token':$('input[name=_token]').val(),'purcase_id':purcase_id},
             success:function(data)
             {
               $(".submit").attr('disabled','disabled');
               $(".purcase_id").val(data.purcase_id);
               $(".purcase_date").val(data.date);
               $(".company_name").val(data.company_name);
               $(".medicine_name").val(data.medicine_name);
               $(".medicine_code").val(data.medicine_code);
               $(".grand_total").val(data.grand_total);
               $(".pay").val(data.pay);
               $(".the_rest").val(data.rest);
             }
         });
          
      });
      $(".now_pay").unbind().keyup(function(){
          var now_pay=$(this).val();
          var last_pay=$(".pay").val();
          if(now_pay.length==0)
          {
             $(".submit").attr('disabled','disabled');
          }
          else
          {
            var now_pay_total=parseInt(now_pay)+parseInt(last_pay);
            var grand_total=$(".grand_total").val();
            var now_rest=grand_total-now_pay_total;
            $(".the_rest").val(now_rest);
            $(".submit").removeAttr('disabled');
          }

      });
  });
</script>
@stop