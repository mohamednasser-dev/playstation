<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
   	protected $table="contact_us";
    protected $fillable = ['slack','name','phone','email','message','customer_id','photo'];
}
