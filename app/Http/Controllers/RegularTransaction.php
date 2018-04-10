<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WholeSaleChildModel;
use App\RetailSaleChildModel;
use App\ExpenseForModel;
use App\RegularTransactionModel;
class RegularTransaction extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('Admin.Report.regular_transaction');
    }


    public function transaction(Request $request)
    {
      $date=$request->date;
      $whole_Sale=WholeSaleChildModel::where('date',$date)->get();
      $retail_Sale=RetailSaleChildModel::where('date',$date)->get();
      $expense=ExpenseForModel::where('expense_date',$date)->first();

      $whole_sale_cost=0;
      $whole_sale_payment=0;
      $retail_sale_cost=0;
      $retail_sale_payment=0;

      $table="<div class=\"content mt-3\">";
               $table.="<div class=\"animated fadeIn\">";
                   $table.="<div class=\"row\">";
                      $table.="<div class=\"col-md-12\">";
                       $table.="<div class=\"card\">";
                           $table.="<div class=\"card-header\">";
                               $table.="<strong class=\"card-title\">Regular Data Table</strong>";
                           $table.="</div>";
                           $table.="<div class=\"card-body\">";
                     $table.="<table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\">";
                       $table.="<thead>";
                         $table.="<tr>";
                           $table.="<th>Whole Sale Cost</th>";
                           $table.="<th>Whole Sale Payment</th>";
                           $table.="<th>Miscellaneous Expenses In Whole Sale</th>";
                           $table.="<th>Retail Sale Cost</th>";
                           $table.="<th>Retail Sale Payment</th>";
                           $table.="<th>Retail Sale Due</th>";
                           $table.="<th>Expense</th>";
                           $table.="<th>Cash</th>";
                         $table.="</tr>";
                       $table.="</thead>";
                       $table.="<tbody>";
                        $table.="<tr>";
                          foreach($whole_Sale as $whole_Sale_value)
                          {
                            $whole_sale_cost=$whole_sale_cost+$whole_Sale_value->grand_total;
                            $whole_sale_payment=$whole_sale_payment+$whole_Sale_value->payment;
                          }
                            $table.="<td class='whole_sale_cost'>$whole_sale_cost</td>";
                            $table.="<td class='whole_sale_payment'>$whole_sale_payment</td>";
                            $table.="<td>";
                             $table.=$whole_sale_cost-$whole_sale_payment;
                            $table.="</td>";
                         foreach($retail_Sale as $retail_Sale_value)
                         {
                          $retail_sale_cost=$retail_sale_cost+$retail_Sale_value->grand_total;
                          $retail_sale_payment=$retail_sale_payment+$retail_Sale_value->payment;
                         }
                            $table.="<td class='retail_sale_cost'>$retail_sale_cost</td>";
                            $table.="<td class='retail_sale_payment'>$retail_sale_payment</td>";
                            $table.="<td class='due'>";
                             $table.=$retail_sale_cost-$retail_sale_payment;
                           $table.="</td>";
                           $expense_data_value=$expense ? $expense->expense_cost: '-' ;
                           $due=$retail_sale_cost-$retail_sale_payment;
                           $total_expense=$expense_data_value+$due;
                            $table.="<td class='expense'>$expense_data_value</td>";
                            $table.="<td class='cash'>";
                             $table.=($whole_sale_payment+$retail_sale_payment)-$total_expense;
                        $table.="</tr>";

                       $table.="</tbody>";
                     $table.="</table>";
                           $table.="</div>";
                       $table.="</div>";
                   $table.="</div>";
        $table.="</div>";
        $table.="</div>";
      $table.="</div>";
      echo $table;
    }


    public function transaction_save(Request $request)
    {
       $regular_transaction=new RegularTransactionModel;
       $prev_data=$regular_transaction::where('date',$request->date)->first();
       if($prev_data)
       {
         return "Already Saved";
       }
       else
       {
           $regular_transaction->fill($request->all())->save();
           return "Regular Transaction Saved Successfully";
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaction_data=RegularTransactionModel::all();
        return view('Admin.Report.transaction_report',['transaction_data'=>$transaction_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
