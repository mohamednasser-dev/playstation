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
use App\Models\Country ;
use App\Models\Orders ;
use App\Models\Product ;
use App\Models\Order_Products ;
use App\Models\Payment_Methods ;
use App\Models\Discount_Codes ;
use App\Models\Payment ;
use App\Models\Category ;
use App\Models\Carts ;
use Auth ;
use Cart ;
use Carbon\Carbon;
use Illuminate\Session\Store;
class OrderController extends Controller
{
    public function SubmitOrder(Request $request)
    {

        if(Cart::count() == 0){
            return redirect()->route('/',app()->getLocale());
        }
        $user = Auth::user() ;
        $address = $request->only('building','street','flatnumber','delivery_area','landmark','country') ;
        $address_id = $request->address_id ;
        $co = Country::find($address['country']) ;
        if(app()->getLocale() == 'en')
            $country_name = $co->name ;
        else
            $country_name = $co->name_ar ;

        if($user)
        {
            $Customer = Auth::user() ;
            if($address_id != null){
                 Customer_Addresses::where('id',$address_id)->update($address) ;
                 $cust_addrress = $address_id ;
            }else{
                $address['customer_id'] = $Customer->id ;
                $address['slack'] = Str::random(30) ;
                $cust_addrresss =Customer_Addresses::create($address) ;
                $cust_addrress = $cust_addrresss->id ;
            }
        }else{

            $customercheck = Customer::where('email',$request->email)->first() ;
            if($customercheck){
                return redirect()->back()->with('msg','This email already in use . try another one or login.') ;
            }
            $inputs = $request->only('name','phone','email','country') ;
            $inputs['password'] = "" ; 
            $inputs['slack'] = Str::random(30) ;
            $Customer = Customer::create($inputs) ;
            $address['customer_id'] = $Customer->id ;
            $address['slack'] = Str::random(30) ;
            $cust_addrresss =Customer_Addresses::create($address) ;
            $cust_addrress = $cust_addrresss->id ;
        }

        $request->session()->put('cust_id', $Customer->id);


        $total = 0 ;
        $finalProductArr = [] ;
        foreach(Cart::content() as $row){
            $product = Product::find($row->id) ;
            $total += $product->checkoutproductTotal()*$row->qty ;
            $prodDetails['id'] = $row->id ;
            $prodDetails['qty'] = $row->qty ;
            $prodDetails['product'] = $product ;
            $finalProductArr[] = $prodDetails ;        
        }

        $discount_Arr['discount'] = 0.00 ;
        $discount_Arr['total'] = 0.00 ;
        $id = null ;
        $precentage = "0.00";
        $code = null;

        if(!empty($request->coupon_voucher) ){
            $coupon = Discount_Codes::where('discount_code',$request->coupon_voucher)->where('status','1')->first();

            if($coupon){
                $id = $coupon->id ;
                $precentage = $coupon->discount_percentage ;
                $code = $coupon->discount_code ;
                if($coupon->discount_type == '1'){
                    $discountt = 0 ;
                    foreach(Cart::content() as $row){
                        $product = Product::find($row->id) ;
                        if($product->discount_code_id == $coupon->id){
                            $discountt += (($product->checkoutproductTotal())*$coupon->discount_percentage)*$row->qty ;
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
                            $discountt += (($product->checkoutproductTotal())*$coupon->discount_percentage)*$row->qty ;
                        }
                    }
                    
                    $discount_Arr['discount'] = number_format($discountt,2) ;
                    $discount_Arr['total'] = number_format(($request->total - $discountt),2) ;

                }elseif($coupon->discount_type == '3'){
                    $discount_Arr['discount'] = number_format((($request->total)*$coupon->discount_percentage),2) ;
                    $discount_Arr['total'] = number_format(($request->total - $discount_Arr['discount']),2) ;

                }

                // $coupon->discount_num = $coupon->discount_num - 1 ;
                // $coupon->save() ;
            }

        }
        //amany zalat
        if($request->payment_method_id>1){$data['status']=0;}
        $data['slack'] = Str::random(30) ;
        $data['store_id'] = 1 ;
        $data['order_number'] = mt_rand(10000, 9999999) ;
        $data['customer_id'] = $Customer->id ;
        $data['customer_phone'] = $request->phone ;
        $data['customer_email'] = $request->email ;
        $data['customer_address'] = $cust_addrress ;
        $data['store_level_discount_code_id'] = $id ;
        $data['store_level_discount_code'] = $code;
        $data['store_level_total_discount_percentage'] = $precentage ;
        $data['store_level_total_discount_amount'] = $discount_Arr['discount'] ;
        $data['product_level_total_discount_amount'] = $discount_Arr['discount'] ;
        $data['store_level_tax_code_id'] = null ;
        $data['store_level_tax_code'] = null ;
        $data['store_level_total_tax_percentage'] = "0.00" ;
        $data['store_level_total_tax_amount'] = "0.00" ;
        $data['store_level_total_tax_components'] = "" ;
        $data['product_level_total_tax_amount'] = "0.00" ;
        $data['purchase_amount_subtotal_excluding_tax'] = "0.00" ;
        $data['sale_amount_subtotal_excluding_tax'] = "0.00" ;
        $data['total_discount_amount'] = $discount_Arr['discount'] ;
        $data['total_after_discount'] = $discount_Arr['total'] ;
        $data['total_tax_amount'] = "0.00" ;
        $data['total_order_amount'] = $total - $discount_Arr['discount']  ;
        $payment_method = Payment_Methods::find($request->payment_method_id);
        $data['payment_method_id'] = $payment_method->id ;
        $data['payment_method_slack'] = $payment_method->slack ;
        $data['payment_method'] = $payment_method->label_en ;
        $data['country_id'] = $Customer->country ;

        $order = Orders::create($data) ;

	if($request->products){
        foreach ($request->products as $value) {
            $id_qty = explode('_', $value) ;
            $product = Product::find($id_qty[0]) ;
            $proData['slack'] = Str::random(30) ;
            $proData['order_id'] = $order->id ;
            $proData['product_id'] = $product->id ;
            $proData['product_slack'] = $product->slack ;
            $proData['product_code'] = $product->product_code ;
            $proData['name'] = $product->name_en ;
            $proData['quantity'] = $id_qty[1] ;
            $proData['purchase_amount_excluding_tax'] = $product->purchase_amount_excluding_tax ;
            $proData['sale_amount_excluding_tax'] = $product->sale_amount_excluding_tax ;
            $proData['discount_code_id'] = $id; 
            $proData['discount_code'] = $code ;
            $proData['discount_percentage'] = $precentage;
            $proData['tax_code_id'] = null ;
            $proData['tax_code'] = null;
            $proData['tax_percentage'] = "0.00";
            $proData['tax_components'] = null;
            $proData['sub_total_purchase_price_excluding_tax'] = "0.00";
            $proData['sub_total_sale_price_excluding_tax'] = "0.00";
            $proData['discount_amount'] = $discount_Arr['discount'];
            $proData['total_after_discount'] = $discount_Arr['total'];
            $proData['tax_amount'] = "0.00";
            $proData['total_amount'] = $product->checkoutproductTotal()*$id_qty[1];
            Order_Products::create($proData) ;

            $product->quantity = $product->quantity - $id_qty[1] ;
            $product->save() ;
		}

        }
if($request->payment_method_id>1)
{
   $Time =   Str::random(10).time();
    $priceTotal= $total - $discount_Arr['discount'] ;
        $baseUrl = 'https://demo.bookeey.com/portal/mobileBookeeyPg';
        $price = '"'. $priceTotal.'"';
       /* $merchantId = 'mer20000393';
        $secreatKey = '3650191';*/
        $merchantId = 'mer2000013';
        $secreatKey = '5083930';
        $furl = 'https://web.myloverra.com/'.app()->getLocale().'/paymentFail';
        $surl = 'https://web.myloverra.com/'.app()->getLocale().'/paymentSuccess';
        $tranid = $Time;
        $txntime = $Time;
        $hashMac = self::GenerateHashMac($request->price, $tranid);
        $PaymentName=Payment_Methods::find($request->payment_method_id);
        $paymentOptions = $PaymentName->label_en;
        $Payment = new Payment();
        $Payment->txnId = $tranid;
        $Payment->custromer_id = $Customer->id;
        $Payment->amount =  (double) $priceTotal;
        $Payment->save();

        $Url = $baseUrl."?data={\"price\":\"{$priceTotal}\",\"merchantId\":\"{$merchantId}\",\"secreatKey\":\"{$secreatKey}\",\"surl\":\"{$surl}\",\"furl\":\"{$furl}\",\"tranid\":\"{$tranid}\",\"txntime\":\"{$txntime}\",\"hashMac\":\"{$hashMac}\",\"paymentOptions\":\"{$paymentOptions}\"}";
   
        $Curl = curl_init();
        curl_setopt($Curl, CURLOPT_URL, $Url);
        curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($Curl);
        curl_close($Curl);
      $result = json_decode($result);
   
        
     
     
        if(isset($result->bookeeyUrl)) {
             
            return  redirect()->to($result->bookeeyUrl);
             
           
        }
       
        if(isset($result->knetUrl)) {
            return  redirect()->to($result->knetUrl);
             
           
        }
        
        if(isset($result->ccUrl)) {
            return  redirect()->to($result->ccUrl);
             
            
        }
        if(isset($result->g_status)&&$result->g_status == -1) {
              Orders::findOrFail($order->id)->delete();
              Order_Products::where("order_id",$order->id)->delete();
              Payment::where('txnId',$tranid)->delete();
             return view('pages.paymentFailPay');
        }
            if(!isset($result->g_status))
            {
                  Orders::findOrFail($order->id)->delete();
                      Order_Products::where("order_id",$order->id)->delete();
                 Payment::where('txnId',$tranid)->delete();
                     return view('pages.paymentFailPay');
            }
        
          }
        else{
            $address= Customer_Addresses::find($order->customer_address);
            Carts::where('customer_id',$Customer->id)->delete() ;
            Cart::destroy();
            
            $PaymentName=Payment_Methods::find($order->payment_method_id);
            $products=Product::join('order_products','products.id','=','order_products.product_id')->where("order_id",$order->id)->get();
        return view('pages.order_success',['order_no' =>$order,'contact_no'=>$Customer->phone,'order_products'=>$products,'PaymentName'=>$PaymentName->label_en,'address' => $address,'country_name' => "" ,app()->getLocale()]) ;
        }
       

    
    }

 public function GenerateHashMac($price, $time)
    {
        $mid = 'mer2000013';
        $secret_key = '5083930';
        $txRefNo = $time;
        $furl = 'https://web.myloverra.com/'.app()->getLocale().'/paymentFail';
        $surl = 'https://web.myloverra.com/'.app()->getLocale().'/paymentSuccess';
        $crossCat = 'GEN';
        $txTime = $time;
        $amt = (string) $price;
        // "mid|txnRefNo|su|fu|amt|txnTime|crossCat|secret_key"
        $hstring = $mid.'|'.$txRefNo.'|'.$surl.'|'.$furl.'|'.
            $amt.'|'.$txTime.'|'.$crossCat.'|'.$secret_key;

        $sig = hash('sha512', $hstring);

        return $sig;
    }
    
      public function paymentSuccess (Request $request)
    {
          if($request->merchantTxnId)
          {
        $res = self::requery($request->merchantTxnId);
        $res = json_decode($res);
        if(Auth::user()){
            $Customer =Auth::user()->id;
        }else{
           $Customer = $request->session()->get('cust_id'); 
        }
        
         

        $Payment = Payment::where('txnId', $request->merchantTxnId)->first();
		if($Payment){
			$order = Orders::find($Payment->order_id);
		}
        $Payment->order_id = $order->id;
        $order->status=1;
        $Payment->totalAmountDebittedFromCust = $res->totalAmountDebittedFromCust;
        $Payment->totalAmountCreditedToMerchant = $res->totalAmountCreditedToMerchant;
        $Payment->tranStatus = $res->tranStatus;
        $Payment->walletTranStatus = $res->walletTranStatus;
        $Payment->merchantTxnRefNo = $res->merchantTxnRefNo;
        $Payment->txnRefNo = $res->txnRefNo;
        $Payment->merchantID = $res->merchantID;
        $Payment->successUrl = $res->successUrl;
        $Payment->failureUrl = $res->failureUrl;
        $Payment->crosscat = $res->crosscat;
        $Payment->requestHashMac = $res->requestHashMac;
        $Payment->paymentOptions = $res->paymentOptions;
        $Payment->merchantName = $res->merchantName;
        $Payment->payment_date = Carbon::today()->toDateString();
        $Payment->confirmed = 1;
        $Payment->statusDescription = $res->statusDescription;
        $Payment->created_at = Carbon::today()->toDateString();
        $Payment->save();
        $order->save();
         $address= Customer_Addresses::find($order->customer_address);
         Carts::where('customer_id',$Customer)->delete() ;
        Cart::destroy();
                $PaymentName=Payment_Methods::find($order->payment_method_id);
              $products=Product::join('order_products','products.id','=','order_products.product_id')->where("order_id",$order->id)->get();
			  dd($order);
        return view('pages.order_success',['order_no' =>$order,'contact_no'=>$order->customer_phone,'order_products'=>$products,'PaymentName'=>$PaymentName->label_en,'address' => $address,'country_name' => "",'txnId'=>$request->merchantTxnId ,app()->getLocale()]) ;
          }

    }  
    
    public static function requery ($txnId) 
    {
         $URL = "https://demo.bookeey.com/portal/paymentrequery?txnId={$txnId}";
        
        $Curl = curl_init();
        curl_setopt ( $Curl, CURLOPT_URL, $URL );
        curl_setopt ( $Curl, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec ( $Curl );
        curl_close ( $Curl );
        return $result;
    }
    public function paymentFail (Request $request)
    {
        if(Auth::user()){
            $Customer =Auth::user()->id;
        }else{
           $Customer =Session::get('cust_id'); 
        }
        $order=Orders::where("status",0)->where("customer_id",$Customer)->
            whereDate('created_at', '=', Carbon::today()->toDateString())->first();
        if($order){
         $order->delete();
         Order_Products::where("order_id",$order->id)->delete();
        }
         Payment::where('txnId',$request->merchantTxnId)->delete();
        return view('pages.paymentFail');
    }
    public function OrderHistory(){
        $user = Auth::user() ;
        if(!$user){
            abort(404) ;
        }
        $orders = Orders::where('customer_id',$user->id)->orderBy('orders.created_at', 'ASC')->get() ;
        
        $ordersArr = [] ;
        foreach ($orders as $value) {
            $order_products = Order_Products::select('*','order_products.quantity as qty')->where('order_products.order_id',$value->id)
                            ->join('products','products.id','=','order_products.product_id')->first() ;
            $orderArr['product'] = $order_products ; 
            $orderArr['status'] = $value->order_status_id ;
            $orderArr['total'] = $value->OrderTotal() ;
            $orderArr['order_no'] = $value->order_number ;
            $orderArr['created_at'] = $value->created_at ; 
            $orderArr['order_id'] = $value->id ;
            $ordersArr[] = $orderArr ;  
        }
        return view('pages.orderspage',['orders' => $ordersArr,app()->getLocale()]);
    }

    public function OrderDetails($lang,$id){
        $order = Orders::find($id) ;
        $order_products = Order_Products::select('*','order_products.quantity as qty')->where('order_products.order_id',$id)
            ->join('products','products.id','=','order_products.product_id')->get() ;
        //dd($id);
        $co = Country::find($order->country_id) ;
        if(app()->getLocale() == 'en')
            $country_name = $co->name ;
        else
            $country_name = $co->name_ar ;

        $address = Customer_Addresses::find($order->customer_address) ;
        return view('pages.order-details',['order_no' =>$order,'order_products'=>$order_products,'country_name' => $country_name ,'address' => $address,'id'=>$id,'language'=>app()->getLocale()]) ;
    }

}
