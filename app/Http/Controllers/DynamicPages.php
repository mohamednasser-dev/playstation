<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicPages extends Controller
{
    public function about(){
    	return view('pages.about',[app()->getLocale()]);
    }

    public function terms(){
    	return view('pages.terms',[app()->getLocale()]);
    }

    public function return_exchange(){
    	return view('pages.returnandexchange',[app()->getLocale()]);
    }

    public function shipping(){
    	return view('pages.shipping',[app()->getLocale()]);
    }
    
    public function privacy(){
        return view('pages.privacy',[app()->getLocale()]);
    }
}
