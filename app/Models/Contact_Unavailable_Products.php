<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_Unavailable_Products extends Model
{
    protected $table="contact_unavailable_products";
    protected $fillable = ['email','product_id'];
}
