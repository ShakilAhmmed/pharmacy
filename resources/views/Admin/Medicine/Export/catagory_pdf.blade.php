  <div class="content mt-3">
  <style type="text/css">
    table{
      border-collapse: collapse;
      width: 700px;
    }
    table,th,td{
      border:1px solid black;
    }
  </style>
            <div class="animated fadeIn">
                <div class="row">
                   <div class="col-md-12">
                    <div class="card">
                    <div style="float: right;margin-top: -10px;font-size: 10px;margin-right: 20px;">
                       <span>Developed By: Code Breakers</span>
                    </div>
                        <div class="card-header">
                            <strong class="card-title">Catagory Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Catagory Name</th>
                        <th>Catagory Description</th>
                        <th>Catagory Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                       @foreach($catagory_data as $key=>$catagory_data_value)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$catagory_data_value->catagory_name}}</td>
                        <td>{{$catagory_data_value->catagory_description}}</td>
                        <td>
                         @if($catagory_data_value->catagory_status=='Active')
                          <span style="color: green;">{{$catagory_data_value->catagory_status}}</span>
                         @else
                          <span style="color: red;">{{$catagory_data_value->catagory_status}}</span>
                         @endif
                         </td>
                      @endforeach
                      </tr>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
     </div>
     </div>
     </div>