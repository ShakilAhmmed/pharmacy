<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockModel extends Model
{
    protected $table="stock";
    protected $primaryKey="stock_id";
    protected $fillable=['medicine_code','total_stock','stock_id'];
}
