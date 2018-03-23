<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WholeSaleModel extends Model
{
    protected $table="whole_sale";
    protected $primaryKey="whole_sale_id";
    protected $fillable=['invoice_id','medicine_code','quantity','whole_sale_id'];


    public function rules()
    {

    	return [
                 'medicine_code'=>'required',
                 'invoice_id'=>'required',
                 'quantity'=>'required'
    	       ];
    }
}
