<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table="favorite";
    protected $fillable = ['product_id','customer_id'];
}
