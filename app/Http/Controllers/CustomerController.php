<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer ;
use App\Models\Customer_Addresses ;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Newsletter ;
use App\Models\ContactMessage ;
use App\Models\Favourite ;
use App\Models\Product ;
use App\Models\Country ;
use App\Models\Soldout;
use App\Models\Discount_Codes ;
use App\Models\Category ;
use App\Models\Orders ;
use App\Models\Carts ;
use Session ;
use Auth ;
use Cart ;
class CustomerController extends Controller
{
    public function index(){
    	$customer = Customer::find(auth()->user()->id) ;
    	return view('pages.profile',[app()->getLocale(),'customer'=>$customer]) ;
    }

    public function updateProfile(Request $request){
    	$inputs = $request->only('name','phone','country') ;
    	$customerID = $request->customer_id ;
    	$Customer = Customer::where('id',$customerID)->update($inputs);
    	$address=$request->only('delivery_area','flatnumber','street','building','landmark','country') ;
        if($request->address_id != null){
            $customerAdress = Customer_Addresses::where('id',$request->address_id)->update($address);
        }else{
            $address['customer_id'] = $customerID ;
            $address['slack'] = Str::random(30) ;
            $customerAdress = Customer_Addresses::create($address) ;
        }
    	Toastr::success('Customer Updated successfully :)','Success');
    	return redirect()->back() ;
    }	

    public function NewsLetterSubscribe(Request $request){
    	$customer = Newsletter::where('email',$request->email)->get() ;
        if(count($customer) > 0 ){
            return redirect()->back()->with('message','your already subscribed in Newsletter with this mail');
        }else{
            $input = $request->only('email') ;
            Newsletter::create($input) ;
            Toastr::success('Successfully Updated :)','Success');

            return redirect()->back() ;
        }

    }

    public function NewsLetterSubscribeAjax(Request $request){
        $customer = Newsletter::where('email',$request->email)->get() ;
        if(count($customer) > 0 ){
            return 'fail' ;
        }else{
            $input = $request->only('email') ;
            Newsletter::create($input) ;
            //Toastr::success('Successfully Updated :)','Success');
            return 'ok';
        }
    }
    public function ChangePassword(Request $request){
            $request->validate([
                'old_password' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        $user = auth()->user();

        if ( !Hash::check($request->old_password, $user->password) ) {
            return redirect()->back()->withErrors(['your old password does not match with the exist password']);

        } elseif ( $request->old_password == $request->password ) {
            return redirect()->back()->withErrors(['your new password must not be same as the old password']);
        } else {
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                Toastr::success('Successfully Updated :)','Success');

                return redirect()->back() ;
            }
        }
    }


    public function My_Wishlist(Request $request){
        $wishlists = Favourite::where('customer_id',auth()->user()->id)->get() ;
        return view('pages.mywishlist',[app()->getLocale(),'wishlists'=>$wishlists]) ;
    }

    public function Addressess(Request $request){
        return view('pages.address-book',[app()->getLocale()]) ;
    }

    public function Checkout(Request $request) {
        if(Cart::count() == 0){
            return redirect()->route('/',app()->getLocale());
        }
        $finalProductArr = [] ;
        foreach(Cart::content() as $row){
            $product = Product::find($row->id) ;
            $prodDetails['id'] = $row->id ;
            $prodDetails['qty'] = $row->qty ;
            $prodDetails['product'] = $product ;
            $finalProductArr[] = $prodDetails ;
        }

        return view('pages.checkout',[app()->getLocale() , 'CheckoutProducts' => $finalProductArr ]) ;
    }

    public function ContactUserMessage(Request $request) {
        $inputs = $request->only('name','email','phone','message') ;
        if(Auth::user())
        {
            $inputs['customer_id'] = Auth::user()->id ;
        }
        $inputs['slack'] = Str::random(30) ;

        ContactMessage::create($inputs) ;
        $mails = $request->email ;
        // \Mail::send('pages.emails', ['name' => $request->name ,'phone' => $request->phone ,
        // 'mails' => $mails , 'messages' =>$request->message], function ($m)  {
        //     $m->to('info@myloverra.com');
        //     $m->subject('test');
        // });

        Toastr::success('Message Successfully Sent Will contact you soon  :)','Success');
        return redirect()->back() ;
    }
    public function DefaultAddress(Request $request){

       // $defaultone = $request->default ;
        Customer_Addresses::where('customer_id',$request->customer_id)->update(['is_default' => 0]) ;

        $customer  = Customer_Addresses::find($request->default) ;
        $customer->is_default = 1 ;
        $customer->save() ;

        Toastr::success('Address Default Added :)','Success');
        return redirect()->back() ;
    }

    public function EditAddress(Request $request){
        $address=$request->only('delivery_area','street','building','country') ;
            
        if($request->flatnumber){
            $address['flatnumber'] = $request->flatnumber ;
        }

        if($request->landmark){
            $address['landmark'] = $request->landmark ;
        }
        
        Customer_Addresses::where('id',$request->address_id)->update($address) ;

        Toastr::success('Customer Updated successfully :)','Success');

        return redirect()->back() ;
    }

    public function CartAdd(Request $request){
        $prodDetails = Product::find($request->product_id) ;
        if($prodDetails->quantity < $request->quantity ){
            Cart::add($request->product_id,$prodDetails->ProductNameLang(app()->getLocale()), number_format($prodDetails->quantity,0),$prodDetails->ChangeCurrValue());
        }else{

            Cart::add($request->product_id,$prodDetails->ProductNameLang(app()->getLocale()), $request->quantity,$prodDetails->ChangeCurrValue());
        }
        
        //$cart
       //$returnHTML =view('pages.cartload',[app()->getLocale()])->render();
        // $array=array($name1,$latest,$price);
        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }   

        return response()->json( array('success' => true,'cart_count'=>$currency." ".Cart::subtotal()) );
    }

    public function CartUpdate(Request $request){

        foreach ($request->products as $value) {
            $prodDetails = Product::find($value['product_id']) ;
            if($prodDetails){
                if($prodDetails->quantity < $value['qty'] ){
                    Cart::update($value['rowId'], $prodDetails->quantity);
                }else{

                    Cart::update($value['rowId'], $value['qty']);
                }
            }
        }
        
        if(!empty(Session::get('country-curr')) ){
            $currency = Session::get('country-curr') ;
        }else{
            $currency = 'KWD' ;
        }   


        return response()->json( array('success' => true,'cart_count'=>$currency." ".Cart::subtotal()) );
    }

    public function CartDelete(Request $request){
        Cart::remove($request->id);
    }

    public function CartDestroy(){
        Cart::destroy();
    }

    public function WishListAdd(Request $request){
        $wishlistsitem = Favourite::where('product_id',$request->product_id)->where('customer_id',$request->customer_id)->first() ;
        if($wishlistsitem){

        }else{
            $inputs = $request->only('customer_id','product_id') ;
            Favourite::create($inputs) ;
        }

        $returnHTML =view('pages.wishlistload',[app()->getLocale()])->render();
        // $array=array($name1,$latest,$price);
               
        return response()->json( array('success' => true,'html'=>$returnHTML) );
    }


    public function WishListDelete(Request $request){
        Favourite::where('id',$request->id)->delete() ;
        // if($wishlistsitem){

        // }else{
        //     $inputs = $request->only('customer_id','product_id') ;
        //     Favourite::create($inputs) ;
        // }
    }

    public function newAddress(Request $request){
        $address=$request->only('delivery_area','street','building','country') ;
        if($request->flatnumber){
            $address['flatnumber'] = $request->flatnumber ;
        }else{
            $address['flatnumber'] = '' ;
        }

        if($request->landmark){
            $address['landmark'] = $request->landmark ;
        }else{
            $address['landmark'] = '' ;
        }
        $address['customer_id'] = $request->customer_id ;
        $address['slack'] = Str::random(30) ;
        Customer_Addresses::create($address) ;

        Toastr::success('Address Added successfully :)','Success');

        return redirect()->back() ;
    }

    public function sendunavailableproductmail(Request $request){
        $inputs = $request->only('product_id','email') ;
        Soldout::create($inputs) ;

        Toastr::success('Your Message Added successfully :)','Success');

        return redirect()->back() ;
    }

    public function CurrencyExchangeRate(){
       // https://currencydatafeed.com/api/data.php?token=suwiknjkkw2tr8ij9slf&currency=KWD/SAR+KWD/OMR+KWD/BHD+KWD/QAR
        $curl = curl_init();
        $post = [
            'format' => 'xml',
        ];
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://currencydatafeed.com/api/data.php?token=cw3te389e0dmp2ncnf3i&currency=KWD/CAD+KWD/USD+KWD/EGP+KWD/KWD',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $post
        ));
        
        
        $country_ids = ['230','63','38','115'] ;
        $output = curl_exec($curl);
        $result = json_decode($output);
        $ArrRates = [] ;
        
        foreach ($result->currency as $value) {
            $ArrRates[] = $value->value ;
        }

        $ArrRate =[] ;
        for($i=0;$i<count($country_ids);$i++){
            $ArrRate[$country_ids[$i]] = $ArrRates[$i] ;
        }

        foreach ($ArrRate as $key => $value) {
            Country::where('id',$key)->update(['currency_rate_to_dinar' => round($value,2) ]) ;
        }
        
    }


    public function Voucher_Apply(Request $request){
        //where('discount_from','<=',gmdate('Y-m-d H:i:s'))->where('discount_to','>=',gmdate('Y-m-d H:i:s'))
        //>where('discount_num','>','0')
        $coupon = Discount_Codes::where('discount_code',$request->coupon)->where('status','1')->first();

        // [1 => product , 2 => category , 3 => invoice]
        if(!empty($coupon)){
            $check_user_use = Orders::where('store_level_discount_code_id',$coupon->id)->where('customer_id',auth()->user()->id)->first() ;
            if($check_user_use){
                echo "fail2" ;
                    exit();
            }
            $discount_Num_use = Orders::where('store_level_discount_code_id',$coupon->id)->get() ;
            if($coupon->discount_from == '0000-00-00 00:00:00' || $coupon->discount_from == null ){
                if($coupon->discount_num < count($discount_Num_use) ){
                    echo "fail" ;
                    exit();
                }
            }else if($coupon->discount_from != '0000-00-00 00:00:00' || $coupon->discount_from != null){
                if($coupon->discount_from > gmdate('Y-m-d H:i:s') || $coupon->discount_from < gmdate('Y-m-d H:i:s') ){
                    echo "fail" ;
                    exit();
                }
            }else{
                if(($coupon->discount_from > gmdate('Y-m-d H:i:s') || $coupon->discount_from < gmdate('Y-m-d H:i:s')) && $coupon->discount_num < count($discount_Num_use) ){
                    echo "fail" ;
                    exit();
                }
            }
            $coupon_customer_check = Orders::where('customer_id',auth()->user()->id)->where('store_level_discount_code_id',$coupon->id)->where('ip',$request->ip)->first() ;
            if($coupon_customer_check){
                echo "fail" ;
                exit();
            }
            $discount_Arr = [] ;
            if($coupon->discount_type == '1'){
                $discountt = 0 ;
                foreach(Cart::content() as $row){
                    $product = Product::find($row->id) ;
                    if($product->discount_code_id == $coupon->id){
                        $discountt += (($product->ChangeCurrValue())*$coupon->discount_percentage)*$row->qty ;
                    }
                }
                
                $discount_Arr['discount'] = number_format($discountt,2) ;
                $discount_Arr['total'] = number_format(($request->total - $discountt),2) ;
            }elseif($coupon->discount_type == '2'){
                $cat_coupon = Category::where('discount_code_id' , $coupon->id)->first() ;
                $discountt = 0 ;
                foreach(Cart::content() as $row){
                    $product = Product::find($row->id) ;
                    if($product->category_id == $cat_coupon->id){
                        $discountt += (($product->ChangeCurrValue())*$coupon->discount_percentage)*$row->qty ;
                    }
                }
                
                $discount_Arr['discount'] = number_format($discountt,2) ;
                $discount_Arr['total'] = number_format(($request->total - $discountt),2) ;

            }elseif($coupon->discount_type == '3'){
                $discount_Arr['discount'] = number_format((($request->total)*$coupon->discount_percentage),2) ;
                $discount_Arr['total'] = number_format(($request->total - $discount_Arr['discount']),2) ;

            }

            if($discount_Arr['discount'] == 0){
                echo "fail1" ;
            }else{
                return json_encode($discount_Arr) ;
            }
            
        }else{
            echo "fail" ;
        }

    }
}
