<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="country";
    protected $fillable = ['name','code','dial_code','currency_name','currency_code','currency_symbol','status'];
}
