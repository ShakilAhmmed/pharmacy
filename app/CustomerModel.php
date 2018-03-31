<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table="customer";
		protected $primaryKey="customer_id";
protected $fillable=['customer_name','customer_phone','customer_address','customer_status','customer_id'];
		public function rules()
		{
      return [
               'customer_name'=>'required',
							 'customer_phone'=>'required|unique:customer',
							 'customer_address'=>'required',
							 'customer_status'=>'required'
			      ];

		}
}
