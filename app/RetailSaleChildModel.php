<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSaleChildModel extends Model
{
	protected $table="retail_sale_child";
	protected $primaryKey="retail_sale_child_id";
	protected $fillable=['date','customer_name','invoice_id','grnad_total','payment','retail_sale_child_id'];
	public function child_rules()
	{
	 return [
							 'date'=>'required',
							 'customer_name'=>'required',
							 'invoice_id'=>'required',
							 'grand_total'=>'required',
							 'payment'=>'required'
					];
	}
}
