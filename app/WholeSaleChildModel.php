<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WholeSaleChildModel extends Model
{
    protected $table="whole_sale_child";
    protected $primaryKey="whole_sale_child_id";
    protected $fillable=['date','patient_name','invoice_id','grnad_total','payment','whole_sale_child_id'];
    public function child_rules()
    {
    	return [
                 'date'=>'required',
                 'patient_name'=>'required',
                 'invoice_id'=>'required',
                 'grand_total'=>'required',
                 'payment'=>'required'
    	       ];
    }
}
