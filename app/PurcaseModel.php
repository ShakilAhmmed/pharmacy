<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurcaseModel extends Model
{
    protected $table="purcase";
    protected $primaryKey="purcase_id";
    protected $fillable=['date','company_name','medicine_code','quantity','sub_total','grand_total','pay','rest','purcase_id'];


    public function rules()
    {

    	return [
                 'date'=>'required',
                 'company_name'=>'required',
                 'medicine_code'=>'required',
                 'quantity'=>'required',
                 'sub_total'=>'required',
                 'grand_total'=>'required',
                 'pay'=>'required',
                 'rest'=>'required'
    	       ];
    }
}
