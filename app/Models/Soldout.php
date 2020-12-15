<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soldout extends Model
{
    protected $table="soldout";
    protected $fillable = ['product_id','customer_id','email'] ;
}
