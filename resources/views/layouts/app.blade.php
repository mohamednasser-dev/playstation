<!doctype html>
<html lang="{{ str_replace('_', '-', session('locale')) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Loverra">
    <meta name="keywords" content="Loverra">
    <meta name="author" content="Loverra">
    <link rel="icon" href="{{ asset('img/favicon/10.png') }}" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <style>
.dropdown1 {
  overflow: hidden;
}
.dropdown-content1 {
  margin-bottom: -500px;
  display: none;
  position: fixed;
  min-width: 100%;
  border: 1px solid #ddd;
   box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 99;
  overflow: scroll;
  max-height: 400px;
}

/* Links inside the dropdown */
.dropdown-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content1 a:hover {background-color: #080325}
#footermenu li:after {
    content: "|";
}
#footermenu li:last-child:after {
    content: "";
}
</style>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--Magnific css-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!--NoUiSlider css-->
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <!--Animate css-->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--Responsive css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link href=" https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 


</head>
@if(session('locale') == 'en')
<body>
@else
<body style="direction: rtl">
@endif


    <!-- Custom Cursor Start -->
    <div id="cursor-large"></div>
    <div id="cursor-small"></div>
    <!-- Custom Cursor End -->

<div id="app">
    @include("partials.nav")
            @yield('content')      
    @include("partials.footer")
</div>

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
@include("partials.scripts")


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

                url: "/add-cart",
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
                url: "/" + $('html').attr('lang') + "/add-wishlist",
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
    
    function DeleteCart(id){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url: "/delete-cart",
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


    function DestoryCart(){
        let _token   = $('meta[name="csrf-token"]').attr('content');
         

        $.ajax({
                url: "/" + $('html').attr('lang') + "/destroy-cart",
                type:"POST",
                data:{
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
                url: "/" + $('html').attr('lang') + "/delete-wishlist",
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
        var wishlistaddMsg = document.getElementById('wishlistaddMsg').value ;
         //$('#cart_side').hide();
         $('#cartcount').hide();
         $('#loading').show();

        $.ajax({
                url: "/add-cart",
                type:"POST",
                data:{
                  product_id:id,
                  quantity:quantity,
                  _token: _token
                },
                success:function(data){
                    $("#addtocart").modal('show');
                    $("#cartcount").show() ;
                    $("#cartcount").html(data.cart_count) ;
                    $('#loading').hide();
                },
        });
    }

    function showFilter(type){
        $.ajax({
                url: "/select_products",
                type:"POST",
                data:{
                  type:type,
                  _token: _token
                },
                success:function(data){
                    $("#addtocart").modal('show');
                    $("#cartcount").show() ;
                    $("#cartcount").html(data.cart_count) ;
                    $('#loading').hide();
                },
        });
    }

    function PutId(id){
        document.getElementById('NotEXISTITEM').value = id ;
    }
    function VisaDataDisply(){
        document.getElementById('VisaDetails').style.display = 'block' ;
    }
</script>
    <script src="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.min.js"></script>
{!! Toastr::message() !!}
@stack('js')
</body>
</html>


