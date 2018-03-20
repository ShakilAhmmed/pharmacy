@extends('Admin.index')
@section('title','Stock Report')
@section('breadcrumbs','Stock Report')
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
                        <th>Company Name</th>
                        <th>Medcine Name</th>
                        <th>Total Stock</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($report_data as $report_data_value)
                      <tr>
                        <td>{{$report_data_value->company_name}}</td>
                        <td>{{$report_data_value->medicine_name}}</td>
                        <td>
                        @if($report_data_value->total_stock>0)
                        <span style="color: green;">{{$report_data_value->total_stock}}</span>
                        @else
                        <span style="color: red;">Out Of Stock</span>
                        @endif

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