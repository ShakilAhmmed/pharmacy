<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegularTransactionModel extends Model
{
    protected $table="regular_transaction";
		protected $primaryKey="regular_transaction_id";
		protected $fillable=['date','whole_sale_cost','whole_sale_payment','retail_sale_cost','retail_sale_payment','expense','cash','due','in_cash'];


}
