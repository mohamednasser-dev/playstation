<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session ;
class Boxes extends Model
{
    protected $table="boxes";
    protected $fillable = ['name_ar','name_en', 'price', 'photo', 'count'];

    public function ReturnLangPhoto()
    {
    	return  ImagePath().$this->photo ;
    }

    public function BoxeNameLang($lang){
    	if($lang == 'en'){
    		return $this->name_en ;
    	}else{
    		return $this->name_ar ;
    	}
    }

    public function ChangeCurrValue(){
        //$user = Auth::user() ;

        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }
            //$countryid = $user->country ;
            $curr = Country::where('currency_code',$currency)->first() ;
            $price = number_format($curr->currency_rate_to_dinar * $this->price,2) ;
            return $price ;
        
    }

    public function currency(){
        
        if(!empty($_COOKIE['country-curr'] )){
            return  $_COOKIE['country-curr'] ;
        }else{
            return 'KWD' ;
        }
        
    }
}
