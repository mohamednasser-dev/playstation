<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Define Language group
// Route::redirect('/','switchlang/en') ;
Route::get('switchlang/{local}','ProductController@switchlang');
Route::get('/admin/', "admin/Entry@sign_in")->name('home');
// Route::group(['prefix' => '{language}' ,'where' => ['language' => '[a-zA-Z]{2}']],function(){

	Route::get('/', 'ProductController@index')->name('/');

	Route::get('/about', 'DynamicPages@about')->name('about');
	Route::get('/terms-conditions', 'DynamicPages@terms')->name('terms-conditions');
	Route::get('/return-exchange', 'DynamicPages@return_exchange')->name('return-exchange');
	Route::get('/shipping', 'DynamicPages@shipping')->name('shipping');
	Route::get('/privacy', 'DynamicPages@privacy')->name('privacy');
	
	Route::get('/contact', ['as'=>'contact', function () {
	    return view('pages.contact');
	}]);

	Route::get('/forgot-password', ['as'=>'forgot-password', function () {
	    return view('auth.passwords.email');
	}]);

	Route::get('/cart', ['as'=>'cart', function () {
	    return view('pages.cart');
	}]);

	Route::get('/profile', ['as'=>'profile', function () {
	    return view('pages.profile');
	}])->middleware('auth');

	Route::get('/change_password', ['as'=>'change_password', function () {
	    return view('pages.change-password');
	}])->middleware('auth');

	

	/// Products Category Routes 
	Route::get('{id?}/category-page', 'CategoryController@index')->name('category-page');
	Route::get('{id?}/product-page', 'ProductController@ProductDetails')->name('product-page');
	Route::post('select_products', 'ProductController@select_products')->name('select_products');


	///////  Dashboard Routes ////////
	Route::post('edit-profile','CustomerController@updateProfile')->name('edit-profile')->middleware('auth');
	Route::post('newsletter-sub-ajax','CustomerController@NewsLetterSubscribeAjax')->name('newsletter-sub-ajax');
	Route::post('newsletter-sub','CustomerController@NewsLetterSubscribe')->name('newsletter-sub');
	Route::post('change-password','CustomerController@ChangePassword')->name('change-password')->middleware('auth') ;
	Route::post('contact-us','CustomerController@ContactUserMessage')->name('contact-us');
	Route::get('/My_Wishlist', 'CustomerController@My_Wishlist')->name('My_Wishlist')->middleware('auth');
	Route::get('/address-book', 'CustomerController@Addressess')->name('address-book')->middleware('auth');
	Route::get('/checkout', 'CustomerController@Checkout')->name('checkout')->middleware('auth');
	Route::post('set-default-address','CustomerController@DefaultAddress')->name('set-default-address')->middleware('auth') ;
	Route::post('edit-address','CustomerController@EditAddress')->name('edit-address')->middleware('auth') ;
	Route::post('new-address','CustomerController@newAddress')->name('new-address')->middleware('auth') ;
	Route::post('send-unavailableproductmail','CustomerController@sendunavailableproductmail')->name('send-unavailableproductmail') ;
	Route::get('/giftboxes', 'GiftBoxController@index')->name('giftboxes') ;
	///// Authentication Routes //////
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

	Route::post('add-cart','CustomerController@CartAdd')->name('add-cart') ;
	Route::post('add-wishlist','CustomerController@WishListAdd')->name('add-wishlist') ;

	Route::post('delete-wishlist','CustomerController@WishListDelete')->name('delete-wishlist') ;
	Route::post('delete-cart','CustomerController@CartDelete')->name('delete-cart') ;
	Route::post('destroy-cart','CustomerController@CartDestroy')->name('destroy-cart') ;
	Route::post('add-gift','GiftBoxController@add')->name('add-gift') ;
	//search 
	Route::get('search/{name?}', 'CategoryController@search1')->name('search');
	Route::get('searchnames', 'CategoryController@SearchNames')->name('searchnames');
	Route::get('auto-search', 'CategoryController@AutoSearch')->name('auto-search');
	Route::get('setcookie/{cur}','CookieController@SetCookie')->name('setcookie') ;
	Route::get('/continue_guest', 'CustomerController@Checkout')->name('continue_guest');
	Route::post('update-cart','CustomerController@CartUpdate')->name('update-cart') ;
	
	// Checkout 
	Route::post('finish-order','OrderController@SubmitOrder')->name('finish-orde') ;

	Route::get('apply_voucher','CustomerController@Voucher_Apply')->name('apply_voucher') ;
	Route::get('order-history','OrderController@OrderHistory')->name('order-history') ;
	Route::get('{id?}/order-details','OrderController@OrderDetails')->name('order-details') ;
// });


Route::get('getCurrencyRates','CustomerController@CurrencyExchangeRate') ;
