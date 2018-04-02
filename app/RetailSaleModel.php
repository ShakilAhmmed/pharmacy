<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailSaleModel extends Model
{
	protected $table="retail_sale";
	protected $primaryKey="retail_sale_id";
	protected $fillable=['invoice_id','medicine_code','quantity','retail_sale_id'];


	public function rules()
	{

		return [
							 'medicine_code'=>'required',
							 'invoice_id'=>'required',
							 'quantity'=>'required'
					 ];
	}
}
