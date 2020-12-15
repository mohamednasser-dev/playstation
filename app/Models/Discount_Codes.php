<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount_Codes extends Model
{
    protected $table="discount_codes";
    protected $fillable = ['slack','store_id','label','discount_code','discount_percentage','description','status','discount_type','discount_num','discount_from','discount_to'] ;
}
