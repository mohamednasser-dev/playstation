<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
   	protected $table="contact_us";
    protected $fillable = ['name','phone','email','message','customer_id','photo'];
}
