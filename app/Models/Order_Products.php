<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product ;
use App\Models\Order_Status ;
use Session ;
class Order_Products extends Model
{
    protected $table="order_products";
    protected $fillable = ['slack','order_id','product_id','product_slack','product_code','name','quantity','purchase_amount_excluding_tax','sale_amount_excluding_tax','discount_code_id','discount_code','discount_percentage','tax_code_id','tax_code','tax_percentage','tax_components','sub_total_purchase_price_excluding_tax','sub_total_sale_price_excluding_tax','discount_amount','total_after_discount','tax_amount','total_amount','status'] ;

    public function currency(){
        
        if(!empty(Session::get('country-curr') )){
            return  Session::get('country-curr') ;
        }else{
            return 'KWD' ;
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
            $product = Product::find($this->product_id) ;
            if($product->sale_amount_excluding_tax != '0.00')
                $price = number_format($curr->currency_rate_to_dinar * $product->sale_amount_excluding_tax,2) ;
            else
                $price = number_format($curr->currency_rate_to_dinar * $product->purchase_amount_excluding_tax,2) ;

            
            return $price ;
        
    }

    public function Status($id)
    {
    	$status = Order_Status::find($id) ;

    	if(app()->getLocale() == 'en'){
    		return $status->name_en ;
    	}else{
    		return $status->name_ar ;
    	}

    }

}
