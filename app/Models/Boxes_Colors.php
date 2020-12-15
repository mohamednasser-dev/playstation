<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boxes_Colors extends Model
{
   	protected $table="boxes_color";
    protected $fillable = ['name_ar','name_en', 'price', 'photo','box_id'];
}
