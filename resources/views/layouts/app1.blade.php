<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Loverra">
    <meta name="keywords" content="Loverra">
    <meta name="author" content="Loverra">
    <link rel="icon" href="{{ asset('images/favicon/10.png') }}" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flipclock.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <link href=" https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.css" rel="stylesheet">
    
<style>
.dropdown {
  overflow: hidden;
}
.dropdown-content {
  display: none;
  position: fixed;
  background-color: white;
  min-width: 230px;
  border: 1px solid #ddd;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 99;
  overflow: scroll;
  max-height: 300px;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}
#footermenu li:after {
    content: "|";
}
#footermenu li:last-child:after {
    content: "";
}
</style>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<!--     <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themify-icons.css') }}">
@if(app()->getLocale() == 'en')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" id="color" type="text/css" href="{{ asset('css/color5.css') }}?v=1.2" media="screen">
@else
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" id="color" type="text/css" href="{{ asset('css/color5_ar.css') }}?v=1.2" media="screen">
@endif
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
</head>
@if(app()->getLocale() == 'en')
<body>
@else
<body class="rtl">
@endif


    <!-- loader start -->
 <div class="loader-wrapper">
    <div class=" ">  <!-- <div class=" bar"> -->
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    </div>
</div>
    <!-- loader end -->

<div id="app">
        
    @include("partials.nav")
            @yield('content')      
    @include("partials.footer")
    




<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('text.cart') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
        @if(count(Cart::content()) > 0)
            <ul class="cart_product">
                @php
                    $i=0;
                @endphp
            @foreach(Cart::content() as $row)
                    @php
                        $product = App\Models\Product::find($row->id)
                    @endphp
                @if($product)
                <li>
                    <div class="media">
                        <a href="{{ route('product-page',['id' => $product->id ]) }}">
                            <img alt="" class="mr-3" src="{{$product->ReturnLangPhoto()}}">
                        </a>
                        <div class="media-body">
                            <a href="{{ route('product-page',['id' => $row->id ]) }}">
                                <h4>{{ $product->ProductNameLang(app()->getLocale())}}</h4>
                            </a>
                            <h4>
                                <span>{{ $row->qty }} x {{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</span>
                            </h4>
                            @php
                                $i += $product->ChangeCurrValue()*$row->qty ;
                            @endphp
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#" onclick="DeleteCart('{{ $row->rowId }}','{{ $product->id }}')">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
                @endif
            @endforeach
              
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>{{ __('text.subtotal') }} : <span>@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format($i,2) }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ url('cart') }}" class="btn btn-solid btn-block btn-solid-sm view-cart">{{ __('text.view_cart') }}</a>
                        <a href="{{ url('checkout') }}" class="btn btn-solid btn-solid-sm btn-block checkout">{{__('text.Checkout') }}</a>
                    </div>
                </li>
            </ul>
        @else
            <center><div style="font-size: 22px" >{{ __('text.CartMsg') }}</div></center>
        @endif
        </div>
    </div>
</div>
<!-- Add to cart bar end-->


<!-- Add to wishlist bar -->
<div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('text.My_Wishlist') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
            @auth
                @foreach(\App\Models\Favourite::where('customer_id',auth()->user()->id)->get() as $wishlist)
                    @php
                        $product = App\Models\Product::find($wishlist->product_id) 
                    @endphp
                    @if($product)
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="{{ $product->ReturnLangPhoto() }}">
                            </a>
                            <div class="media-body">
                                <a href="{{ route('product-page',['id' => $product->id ]) }}">
                                    <h4>{{ $product->ProductNameLang(app()->getLocale()) }}</h4>
                                </a>
                                
                                <h4>
                                    <span>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#" onclick="DeleteWishlist('{{ $wishlist->id }}')">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endif
                @endforeach
            @endauth
            </ul>
             <ul class="cart_total">
                <!--<li>
                    <div class="total">
                        <h5>subtotal : <span>KWD 299.00</span></h5>
                    </div>
                </li>-->
                <li>
                    <div class="buttons">
                        <a href="{{ url('My_Wishlist') }}" class="btn btn-solid btn-block btn-solid-sm view-cart">{{ __('text.view_wislist') }}</a>
                    </div>
                </li>
            </ul> 
        </div>
    </div>
</div>
<!-- Add to wishlist bar end-->


<!-- My account bar -->
<div id="myAccount" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('text.my_account') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
         @auth
            <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> {{__('text.back')}}</span></div>
                    <div class="block-content">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">{{ __('text.dashboard') }}</a></li>
                            <li><a href="{{ url('address-book') }}">{{ __('text.Address_Book') }}</a></li>
                            <li><a href="{{ url('order-history') }}">{{ __('text.My_Orders') }}</a></li>
                            <li><a href="{{ url('My_Wishlist') }}">{{ __('text.My_Wishlist') }}</a></li>
                            <!-- <li><a href="#">{{ __('text.Newsletter') }}</a></li>
                            <li><a href="#">{{ __('text.my_account')}}</a></li> -->
                            <li><a href="{{ url('change_password') }}">{{ __('text.Change_Password') }}</a></li>
                            <li class="last"><a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('text.LogOut') }}</a> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf</form></li>
                        </ul>
                    </div>
                </div>
                            
        @else
        <form class="theme-form" action="{{ route('login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('text.email') }}</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('text.email') }}" required="">
            </div>
            <div class="form-group">
                <label for="review">{{ __('text.password') }}</label>
                <input type="password" class="form-control"  name="password" id="review" placeholder="{{ __('text.password') }}" required="">
            </div>
            <button type="submit" class="btn btn-solid btn-solid-sm btn-block ">{{ __('text.login') }}</button>
            <h5 class="forget-class"><a href="{{ url('forgot-password') }}" class="d-block">{{ __('text.forget_password') }}</a></h5>
            <h5 class="forget-class"><a href="{{ url('register')}}" class="d-block">{{ __('text.newtostoreSignupnow') }}</a></h5>
        </form>
        @endauth
    </div>
</div>
<!-- Add to wishlist bar end-->


<!-- Add to cart modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body modal1">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-bg addtocart">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="media">
                                    
                                    <div class="media-body align-self-center text-center">
                                        <a href="#">
                                            <h6>
                                                <i class="fa fa-check"></i>
                                                <span> {{ __('text.successfully_addedto_your_Cart') }}</span>
                                                
                                                
                                            </h6>
                                        </a>
                                        <div class="buttons">
                                            <a href="{{ url('cart') }}" class="view-cart btn btn-solid">{{ __('text.cart') }}</a>
                                            <a href="{{ url('checkout') }}" class="checkout btn btn-solid">{{ __('text.Checkout') }}</a>
                                            <a href="{{ url('/') }}" data-dismiss="modal" class="continue btn btn-solid">{{ __('text.continue_shopping') }}</a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add to cart modal popup end-->


<!-- Modal -->
<div class="modal fade" id="informmsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4> {{ __('text.ifn') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="subscribe-content">
                        
                        <form class="theme-form" action="{{route('send-unavailableproductmail') }}" method="post">
                            @csrf
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="{{ __('text.email') }}..."  >
                                </div>
                                <input type="hidden" name="product_id" id="NotEXISTITEM" >
                                <input type="hidden" name="sub" value="0">
                            
                            <br>
                                <button type="submit" class="btn btn-solid">{{ __('text.subscribe') }}</button>
                            
                        </form>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('text.close') }}</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" name="LoginMsg" id="LoginMsg" value="{{ __('text.LoginMsg') }}">
<input type="hidden" name="wishlistaddMsg" id="wishlistaddMsg" value="{{ __('text.wishlistaddMsg') }}"> 
<input type="hidden" name="coupon_msg" id="coupon_msg" value="{{ __('text.coupon_not_valid') }}">

<input type="hidden" name="coupon1_msg" id="coupon1_msg" value="{{ __('text.coupon1_not_valid') }}">

<input type="hidden" name="used_code" id="used_code" value="{{ __('text.used_code') }}">
<!-- tap to top -->
<div class="tap-top">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top End -->


 

<script type="text/javascript"> 
    function RedirectLogin(){
        var LoginMsg = document.getElementById('LoginMsg').value ;
        swal({
            title:LoginMsg,
            buttons:{
              cancel: false,
              confirm: true
            }
          } ,function(isConfirm){

            if (isConfirm){
             // location.reload();
            }
          }) ;
    }
    function AddCart(id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
         var quantity = document.getElementById('quantity').value;
         $('#cart_side').hide();
         $('#cartcount').hide();
        $.ajax({

                url:"/add-cart",
                type:"POST",
                data:{
                  product_id:id,
                  quantity:quantity,
                  //name:productname,
                  //price:price,
                  _token: _token
                },
                datatype: 'html',
                success:function(data){
                    
                    $('#cart_side').show();
                    $("#cart_side").html(data.html);
                    $("#cartcount").show() ;
                    $("#cartcount").html(data.cart_count) ;
                }, 
        });
    }

    
    function AddWishlist(id,customer_id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var wishlistaddMsg = document.getElementById('wishlistaddMsg').value ;
        $('#wishlist_side').hide();
        $.ajax({
                url:  "/add-wishlist",
                type:"POST",
                data:{
                  product_id:id,
                  customer_id:customer_id,
                  _token: _token
                },
                success:function(data){
                    $('#wishlist_side').show();
                    $("#wishlist_side").html(data.html);
                    swal({
                        title:wishlistaddMsg,
                        buttons:{
                          cancel: false,
                          confirm: true
                        }
                      } ,function(isConfirm){

                        if (isConfirm){
                         // location.reload();
                        }
                      }) ;
                },
        });
    }
    
    function DeleteCart(id,prodId){
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
                url:  "/delete-cart",
                type:"POST",
                data:{
                  id:id,
                  product_id:prodId,
                  //customer_id:customer_id,
                  // quantity:quantity,
                  // name:productname,
                  // price:price,
                  _token: _token
                },
                success:function(response){
                 location.reload();
                },
        });
    }

    function DeleteWishlist(id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
         // var quantity = document.getElementById('quantity').value;
         // var productname = document.getElementById('productname').value;
         // var price = document.getElementById('price').value;

        $.ajax({
                url:  "/delete-wishlist",
                type:"POST",
                data:{
                  id:id,
                  //customer_id:customer_id,
                  // quantity:quantity,
                  // name:productname,
                  // price:price,
                  _token: _token
                },
                success:function(response){
                  location.reload();
                },
        });
    }

    function AddCart2(id,quantity){
        let _token   = $('meta[name="csrf-token"]').attr('content');
         $('#cart_side').hide();
         $('#cartcount').hide();
         $('#loading').show();

        $.ajax({
                url: "/" + $('html').attr('lang') + "/add-cart",
                type:"POST",
                data:{
                  product_id:id,
                  quantity:quantity,
                  //name:productname,
                  //price:price,
                  _token: _token
                },
                success:function(data){
                    $('#cart_side').show();
                    $("#cart_side").html(data.html);
                    $("#cartcount").show() ;
                    $("#cartcount").html(data.cart_count) ;
                    $('#loading').hide();
                },
        });
    }

    function CheckValue(qtycurr){

        var qty = document.getElementById('quantity').value ;
        alert(qty);
        if(qty < 1){
            qty.text() = 1 ;
        }

    }

    function PutId(id){
        document.getElementById('NotEXISTITEM').value = id ;
    }
    function VisaDataDisply(){
        document.getElementById('VisaDetails').style.display = 'block' ;
    }
</script>
 @include("partials.scripts")
    <script src="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>


