<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="country";
    protected $fillable = ['name','name_ar','code','dial_code','currency_name','currency_code','currency_symbol','status','currency_rate_to_dinar'];

    public function  ReturnCurrName(){
    	if(app()->getLocale() == 'en'){
    		return $this->currency_code;
    	}else{
    		return $this->currency_symbol ;
    	}
    }
}
