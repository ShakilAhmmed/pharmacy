<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatagoryModel extends Model
{
    protected $table="catagory";
    protected $primaryKey="catagory_id";
    protected $fillable=['catagory_name','catagory_description','catagory_status','catagory_id'];

    public function rules()
    {
      return [
              'catagory_name'=>'required|max:50|unique:catagory',
              'catagory_description'=>'required',
              'catagory_status'=>'required'
            ];

    }
}
