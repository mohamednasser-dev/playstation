<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boxes ;
use App\Models\Boxes_Cards ;
use App\Models\Boxes_Colors ;
use App\Models\Product;
use App\Models\Gift_Box_Handle;
class GiftBoxController extends Controller
{
    public function index(){
    	$boxes_card = Boxes_Cards::get();
    	$boxes = Boxes::select('*')->get() ;
    	$countArr = [] ;
    	foreach ($boxes as $box) {
    		if(!in_array($box->count, $countArr)){
    			$countArr[] = $box->count ;
    		}
    	}
    	sort($countArr);
    	$clength = count($countArr);
		for($x = 0; $x < $clength; $x++) {
		  $countArrs[] = $countArr[$x] ;
		  $BoxArr[$countArr[$x]] =Boxes::where('count',$countArr[$x])->get() ;
		}
		$products = Product::where('available','1')->get() ;
    	return view('pages.giftboxes',['products' => $products,'boxes_card'=>$boxes_card,'countArrs'=>$countArrs,'boxex'=>$BoxArr,app()->getLocale()]) ;
    }

    public function add(Request $request)
    {   
        foreach ($request->products as $value) {
            Gift_Box_Handle::create(['customer_id' => auth()->user()->id , 'box_id'=> $request->box_id ,'card_id' => $request->card_id,'product_id' => $value,'message'=>$request->msg ]) ;
        }
    }
}
