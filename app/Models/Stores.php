<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table="stores";
    protected $fillable = ['slack','store_code','name','tax_number','tax_code_id','discount_code_id','address','pincode','primary_contact','secondary_contact','primary_email','secondary_email','invoice_type','currency_name','currency_code','status','shipping','free_shipping'] ;
}
