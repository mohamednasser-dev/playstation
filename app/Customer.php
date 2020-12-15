<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer_Addresses ;
use App\Models\Country ;
use App\Models\Newsletter ;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable 
{
    use Notifiable;
    protected $table="customers";
    protected $fillable = ['name','slack','customer_type','email','password','api_token','status','gender','address','country','currency'];

    public function customerAddresses()
    {
        $def = $this->Default_Addresses() ;
        
        if(!$def){
           
    	   return Customer_Addresses::where('customer_id',$this->id)->first() ;
        }else{
            return $def ;
        }
    }

    public function Addresses()
    {
        
        $address = Customer_Addresses::where('customer_id',$this->id)->get() ;
        if(empty($address)){
            return '' ;
        }else{
            return $address ;
        }
        
    }

    public function Default_Addresses()
    {
        
        $address = Customer_Addresses::where('customer_id',$this->id)->where('is_default','1')->first() ;
        if(empty($address)){
            return '' ;
        }else{
            return $address ;
        }
    }

    public function CountryName($countryId){
        $country = Country::find($countryId) ;
        if($country){
            return $country->name ;
        }else{
            return '' ;
        }
    }
    public function country(){
    	//$cust = $this->customerAddresses() ;
        if(!empty($this->country))
    	   return Country::find($this->country) ;
        else
            return '' ;
    }

    public function getNewsletter(){
        $news = Newsletter::where('email',$this->email)->get() ;
        if(count($news) > 0){
            return 1;
        }else{
            return 0 ;
        }
    }
}

