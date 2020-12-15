<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ;
use App\Models\Favourite ;
use App\Models\Order_Products ;
use Auth ;

class ProductController extends Controller
{
      public function switchlang($locale=''){
         \Session::put('locale',$locale);
         return back();
      }
   	public function index(){
   		$products = Product::latest()->LIMIT(12)->get() ;
         $offers = Product::where('sale_amount_excluding_tax','!=','0.00')->where('status','1')->LIMIT(12)->get() ;
         $bestseller = Order_Products::select('product_id')->where('status','1')->groupBy('product_id')->orderByRaw('COUNT(*) DESC')->limit(12)->get();
   		return view('welcome',['products' =>$products ,'offers'=>$offers,'bestseller'=>$bestseller ,app()->getLocale()]) ;
   	}

   	public function ProductDetails($id=null)
   	{
   		$product = Product::find($id) ;
   		$related_products = Product::where('category_id' ,'=' , $product->category_id)->where('status','1')->whereNotIn('id',[$id])->get() ;
         //dd($related_products);
   		return view('pages.product-page',['id'=>$id,app()->getLocale(),'product'=>$product , 'related_products' => $related_products ]) ;
   	}

      public function CategoryProduct ($category=null)
      {
         return view('pages.category-page',[app()->getLocale()]) ;
      }
      public function select_products (Request $request)
      {
         // if($request->type == 'offer'){
            
         // }else if($request->type == 'latest'){
         //    $products = Product::latest()->LIMIT(12)->get() ;  
         // }else if($request->type == 'best'){
            
         // }
         $products = Product::where('sale_amount_excluding_tax','!=','0.00')->where('status','1')->LIMIT(12)->get() ;
         return view('partials.product_item',compact('products'))->render(); 
      }

    //   public function CartAdd(Request $request){
    //     $prodDetails = Product::find($request->product_id) ;
    //     if($prodDetails->quantity < $request->quantity ){
    //         Cart::add($request->product_id,$prodDetails->ProductNameLang(app()->getLocale()), number_format($prodDetails->quantity,0),$prodDetails->ChangeCurrValue());
    //     }else{

    //         Cart::add($request->product_id,$prodDetails->ProductNameLang(app()->getLocale()), $request->quantity,$prodDetails->ChangeCurrValue());
    //     }
        
    //     //$cart
    //    //$returnHTML =view('pages.cartload',[app()->getLocale()])->render();
    //     // $array=array($name1,$latest,$price);
    //     if(!empty(Session::get('country-curr')) ){
    //         $currency = Session::get('country-curr') ;
    //     }else{
    //         $currency = 'KWD' ;
    //     }   

    //     return response()->json( array('success' => true,'cart_count'=>$currency." ".Cart::subtotal()) );
    // }
}
