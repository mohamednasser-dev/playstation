<?php

namespace App\Models;

use App\Models\Photo ;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier ;
use App\Models\Country ;
use App\Models\Category ;
use Session ;
use Auth ;
use Cookie ;
class Product extends Model
{
    protected $table="products";
    protected $dates = ['created_at'] ;
    protected $fillable = ['slack','store_id','product_code','name_en','name_ar','description_en','description_ar','category_id','supplier_id','tax_code_id','discount_code_id','quantity','purchase_amount_excluding_tax','sale_amount_excluding_tax','status','photo','soldout','available','created_by','updated_by'];

    public function ReturnLangPhoto()
    {
    	return  ImagePath().$this->photo ;
    }

    public function ReturnProductPhoto()
    {
        return  Photo::where('product_id',$this->id)->get() ;
    }
    public function HoleItemPhotos(){
        $photoArr = [] ;
        
        $photos = Photo::where('product_id',$this->id)->get() ;
        if(count($photos) > 0){
            foreach ($photos as $photo) {
               $photoArr[] = $photo->photo ;
            }
        }else{
           $photoArr[] = $this->photo ; 
        }

        return $photoArr ;
    }

    public function ProductNameLang($lang){
    	if($lang == 'en'){
    		return $this->name_en ;
    	}else{
    		return $this->name_ar ;
    	}
    }

    public function ProductdescriptionLang($lang){
    	if($lang == 'en'){
    		return $this->description_en ;
    	}else{
    		return $this->description_ar ;
    	}
    }

    public function totalitemprice($qty){
        if($this->sale_amount_excluding_tax != '0.00')
            return $this->sale_amount_excluding_tax*$qty ;
        else
            return $this->purchase_amount_excluding_tax*$qty ;
    }

    public function brand(){
        return Supplier::find($this->supplier_id) ;
    }

    public function ChangeCurrValue(){
        //$user = Auth::user() ;

        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }
            //$countryid = $user->country ;
            $curr = Country::where('currency_code','LIKE',$currency)->first() ;
            if($this->sale_amount_excluding_tax != '0.00')
                $price = number_format($curr->currency_rate_to_dinar * $this->sale_amount_excluding_tax,2) ;
            else
                $price = number_format($curr->currency_rate_to_dinar * $this->purchase_amount_excluding_tax,2) ;

            
            return $price ;
        
    }

    public function checkoutproductTotal(){
        if($this->sale_amount_excluding_tax != '0.00')
            $price = $this->sale_amount_excluding_tax ;
        else
            $price = $this->purchase_amount_excluding_tax ;

            
        return $price ;
    }

    public function getSaleAmount(){

        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }
            $curr = Country::where('currency_code',$currency)->first() ;
            $price = number_format($curr->currency_rate_to_dinar * $this->purchase_amount_excluding_tax,2) ;
        return $price ;
    }

    public function getSalePrecentage(){
        $precentage = (($this->purchase_amount_excluding_tax - $this->sale_amount_excluding_tax)*100)/$this->purchase_amount_excluding_tax ;
        return round($precentage,0) ;
    }

    public function currency(){
        
        if(!empty(Session::get('country-curr') )){
            return  Session::get('country-curr') ;
        }else{
            return 'KWD' ;
        }
    }

    public function getproductItem(){
        $cate = Category::find($this->category_id) ;
        if(app()->getLocale() == 'en'){
            return $cate->label_en ;
        }else{
            return $cate->label_ar ;
        }

    }
    

}
