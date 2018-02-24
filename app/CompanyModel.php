<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $table="company";
    protected $primaryKey="company_id";
    protected $fillable=['company_name','company_phone','company_email','company_address','company_status','company_id'];

    public function rules()
    {
    	return [
                'company_name'=>'required|max:50',
                'company_phone'=>'required|max:14',
                'company_email'=>'required|unique:company',
                'company_address'=>'required',
                'company_status'=>'required'
    	      ];
    }
}
