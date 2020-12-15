<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_Addresses extends Model
{
     protected $table="customers_addresses";
    protected $fillable = ['delivery_area','slack','building','street','flatnumber','landmark','country','city','customer_id'];
}
