<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineModel extends Model
{
    protected $table="medicine";
    protected $primaryKey="medicine_id";
    protected $fillable=['medicine_code','medicine_name','catagory','company_name','desk_name','purcase_price','retail_price','whole_sell_price','medicine_description','medicine_status','medicine_id'];

    public function rules()
    {
      return [
              'medicine_code'=>'required|max:50|unique:medicine',
              'medicine_name'=>'required|max:50',
              'catagory'=>'required|max:50',
              'company_name'=>'required|max:50',
              'desk_name'=>'required|max:50',
              'purcase_price'=>'required|max:50',
              'retail_price'=>'required|max:50',
              'whole_sell_price'=>'required|max:50',
              'medicine_description'=>'required',
              'medicine_status'=>'required'
             ];
    }
}
