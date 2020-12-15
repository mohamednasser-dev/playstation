<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session ;
use Cookie ;
class CookieController extends Controller
{
    //

    public function SetCookie($lang,$cur)
    {
    	Session::put('country-curr', $cur);
    	//setcookie('country-curr', $cur, time()+60*60*24*365);
    	return redirect()->back() ;
    }

}
