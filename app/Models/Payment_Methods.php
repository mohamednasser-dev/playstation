<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_Methods extends Model
{
    protected $table="payment_methods";
    protected $fillable = ['slack','label_ar' ,'label_en','description','status'];
}
