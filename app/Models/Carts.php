<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table="carts";
    protected $fillable = ['product_id','customer_id', 'quantity'];
}
