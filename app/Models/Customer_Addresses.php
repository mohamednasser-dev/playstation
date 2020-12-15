<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer_Addresses extends Model
{
     protected $table="customers_addresses";
    protected $fillable = ['slack','delivery_area','slack','building','street','flatnumber','landmark','country','city','customer_id'];
}
