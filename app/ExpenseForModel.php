<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseForModel extends Model
{
    protected $table="expense_for";
		protected $primaryKey="expense_for_id";
		protected $fillable=['expense_name','expense_cost','expense_date','expense_for_id'];

		public function rules()
		{
			return [
                 'expense_name'=>'required',
								 'expense_cost'=>'required',
								 'expense_date'=>'required'
       			];
		}
}
