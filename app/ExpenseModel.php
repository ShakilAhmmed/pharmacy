<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    protected $table="expense_catagory";
		protected $primaryKey="expense_catagory_id";
		protected $fillable=['expense_name','expense_description','expense_status','expense_catagory_id'];

		public function rules()
		{
      return [
               'expense_name'=>'required|unique:expense_catagory',
							 'expense_description'=>'required',
							 'expense_status'=>'required'
			       ];

		}
}
