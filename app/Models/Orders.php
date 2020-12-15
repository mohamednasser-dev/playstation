<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session ;
class Orders extends Model
{
    protected $table="orders";
    protected $dates =['created_at'] ;
    protected $fillable = ['slack','store_id','order_number','customer_id','customer_phone','customer_email','customer_address','store_level_discount_code_id','store_level_discount_code','store_level_total_discount_percentage','store_level_total_discount_amount','product_level_total_discount_amount','store_level_tax_code_id','store_level_tax_code','store_level_total_tax_percentage','store_level_total_tax_amount','store_level_total_tax_components','product_level_total_tax_amount','purchase_amount_subtotal_excluding_tax','sale_amount_subtotal_excluding_tax','total_discount_amount','total_after_discount','total_tax_amount','total_order_amount','payment_method_id','payment_method_slack','payment_method','status','order_status_id','country_id','ip'] ;

    public function OrderSubTotal(){
    	if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }
        $curr = Country::where('currency_code',$currency)->first() ;
        $price = number_format($curr->currency_rate_to_dinar * ($this->total_order_amount+$this->total_discount_amount),2) ;

        return $price ;
    }

    public function OrderTotal(){
        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }
        $curr = Country::where('currency_code',$currency)->first() ;
        $price = number_format($curr->currency_rate_to_dinar * $this->total_order_amount,2) ;

        return $price ;
    }

    public function total_discount_amount(){
        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }
        $curr = Country::where('currency_code',$currency)->first() ;
        $price = number_format($curr->currency_rate_to_dinar * $this->total_discount_amount,2) ;

        return $price ;
    }

    public function currency(){
        
        if(!empty(Session::get('country-curr') )){
            return  Session::get('country-curr') ;
        }else{
            return 'KWD' ;
        }
    }
}
