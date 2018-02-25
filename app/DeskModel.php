<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeskModel extends Model
{
    protected $table="desk";
    protected $primaryKey="desk_id";
    protected $fillable=['desk_name','desk_code','desk_description','desk_id'];

    public function rules()
    {
       return [
               'desk_name'=>'required|max:50|unique:desk',
               'desk_code'=>'required|max:50|unique:desk',
               'desk_description'=>'required'
             ];
    }
}
