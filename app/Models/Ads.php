<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table="ads";
    protected $fillable = ['slack','store_id', 'title_ar', 'title_en', 'description_ar','description_en','photo','status','category_id'];
}
