<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ;
use App\Models\Category ;
use App\Models\Favourite ;
use Auth ;

class CategoryController extends Controller{
	public function searchBrand(Request $request,$name=null){
	    if($request->bandf){
		    $bands=array_values($request->bandf);
		    $products = Product::whereIn('supplier_id',$bands)->orderBy('id', 'ASC')->take(50)->get();
	    }else{
		    $cat = Category::find($request->cat_id);
			$catss=Category::where('parent',$cat->id)->where('status',1)->get();
            $count=20;
		    if($catss->count()>0){
                $in='';
                for($i=0;$i<$catss->count();$i++){
                    $in.=$catss[$i]->id.',';
                }
                $in= rtrim($in, ',');
                $in=explode(',' ,$in);
	            $products= Product::whereIn('category_id',$in)->paginate($count);
		    }
		}
		$user = Auth::user();
		if($user){
			$wishlists = Favourite::where('customer_id',$user->id)->get();
		}else{
			$wishlists = [];
		}
		$returnHTML =view('pages.search',['id'=>$request->cat_id,'products' =>$products ,app()->getLocale()])->render();
		return response()->json( array('success' => true,'html'=>$returnHTML) );
	}
	public function search1(Request $request,$name=null){
		$cat = Category::find($request->cat_id);
		if($cat){
		    $catss=Category::where('parent',$cat->id)->where('status',1)->get();
            $count=20;
		    $latest=0;$name1=0;$price=0;
		    if($catss->count()>0){
                $in='';
                for($i=0;$i<$catss->count();$i++){
                    $in.=$catss[$i]->id.',';
                }
                $in= rtrim($in, ',');
			    $in=explode(',' ,$in);
                if($request->latest>0){
					$products = Product::whereIn('category_id',$in)->orderBy('id', 'ASC')->take(50)->get();
				    if($request->latest==2)
						$products = Product::whereIn('category_id',$in)->orderBy('id', 'DESC')->take(100)->get();
				}else  if($request->name>0){
					$name='name_en';
					if($request->lang=='ar')
						$name='name_ar';
					$products = Product::whereIn('category_id',$in)->orderBy($name, 'ASC')->get();
					if($request->name==2)
						$products = Product::whereIn('category_id',$in)->orderBy($name, 'DESC')->get();
			    }else  if($request->price>0){
				    $products = Product::whereIn('category_id',$in)->orderBy('purchase_amount_excluding_tax', 'DESC')->get();
					if($request->price==2)
						$products = Product::whereIn('category_id',$in)->orderBy('purchase_amount_excluding_tax', 'ASC')->get();
				}
            }else{	 
	            $count=20;
			    if($request->latest>0){
				    $products = Product::where('category_id',$request->cat_id)->orderBy('id', 'ASC')->take(50)->get();
				    if($request->latest==2)
				        $products = Product::where('category_id',$request->cat_id)->orderBy('id', 'DESC')->take(100)->get();   
			    }else  if($request->name>0){
				    $name='name_en';
				    if($request->lang=='ar')
					    $name='name_ar';
			        $products = Product::where('category_id',$request->cat_id)->orderBy($name, 'ASC')->paginate($count);
				    if($request->name==2)
				        $products = Product::where('category_id',$request->cat_id)->orderBy( $name, 'DESC')->paginate($count);
			    }else  if($request->price>0){
				    $products = Product::where('category_id',$request->cat_id)->orderBy('purchase_amount_excluding_tax', 'DESC')->paginate($count);
					if($request->price==2)
						$products = Product::where('category_id',$request->cat_id)->orderBy('purchase_amount_excluding_tax', 'ASC')->paginate($count);
				}
			}
	        $user = Auth::user();
	        if($user){
	            $wishlists = Favourite::where('customer_id',$user->id)->get();
	        }else{
	            $wishlists = [];
	        }
			$returnHTML =view('pages.search',['id'=>$cat->id,'products' =>$products ,app()->getLocale()])->render();
	        return response()->json( array('success' => true,'html'=>$returnHTML) );
		}
    }
   	public function index($id=null,$page=null){
      	$cat = Category::find($id);
		$catss=Category::where('parent',$cat->id)->where('status',1)->get();
        $count=20;
	    if($catss->count()>0){
            $in='';
            for($i=0;$i<$catss->count();$i++){
                $in.=$catss[$i]->id.',';
            }
            $in= rtrim($in, ',');
            $in=explode(',' ,$in);
            $products= Product::whereIn('category_id',$in)->paginate($count);
			$brand=Product::select('suppliers.id','suppliers.name')->where('category_id',$in)
			->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
			->groupBy('suppliers.id','suppliers.name')
			->get();
		    $productsnew=Product::whereIn('category_id',$in)->orderBy('id', 'DESC')->take(3)->get();
        }else{
			$brand=Product::select('suppliers.id','suppliers.name')->where('category_id',$id)
			->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
			->groupBy('suppliers.id','suppliers.name')
			->get();
		    $products = Product::where('category_id',$id)->paginate($count); 
		    $productsnew=Product::where('category_id',$id)->orderBy('id', 'DESC')->take(3)->get();
        }
        $user = Auth::user();
        if($user){
            $wishlists = Favourite::where('customer_id',$user->id)->get();
        }else{
            $wishlists = [];
        }
   		return view('pages.category-page',['productsnew'=>$productsnew,'cat' =>$cat,'brand'=>$brand ,'products' =>$products ,'id'=>$cat->id,app()->getLocale()]);
   	}
   	public function ProductDetails($lang, $id=null){
   		$product = Product::find($id) ;
   		return view('pages.product-page',['id'=>$id,app()->getLocale(),'product'=>$product]) ;
   	}
    public function SearchNames(Request $request){
    	$brand=Product::select('suppliers.id','suppliers.name')
			->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
			->groupBy('suppliers.id','suppliers.name')
			->get();
    	$products = Product::where('name_ar' ,'like','%'.$request->search_input.'%')->orWhere('name_en' ,'like','%'.$request->search_input.'%')->get() ;
    	$user = Auth::user();
        if($user){
            $wishlists = Favourite::where('customer_id',$user->id)->get();
        }else{
            $wishlists = [];
        }
		return view('pages.nav-search',['searchcrtiria'=>$request->search_input,'products' =>$products ,'brand'=>$brand ,app()->getLocale()]) ;
    }
    public function AutoSearch(Request $request){
    	$products = Product::where('name_ar' ,'like','%'.$request->search_input.'%')->orWhere('name_en' ,'like','%'.$request->search_input.'%')->limit(100)->get() ;
    	$output = "" ;
    	if(count($products) > 0){
	    	foreach ($products as $product) {
	    		$route = '/'.app()->getLocale().'/'.$product->id.'/product-page' ; 
	    		$output .= '<a href= '.$route.'   >'.$product->ProductNameLang(app()->getLocale()).'</a>' ;
	    	}
	    }else{
	    	$output .='<p class="list-group-item border-1">No Record</p>' ;
	    }
    	echo $output ;
    }
}
