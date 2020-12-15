@extends('layouts.app')
@section('content')

 <!-- Breadcrumb Area Start -->
      <section class="fag-breadcrumb-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="breadcromb-box">
                     <h3>{{ __('text.cart') }}</h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="index.html">{{ __('text.Home') }}</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>{{ __('text.cart') }}</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
       
      <!-- Cart Page Start -->
      <section class="fag-cart-page-area section_100">
         <div class="container">
          @if(count(Cart::content()) > 0)
            <div class="row">
               <div class="col-lg-8">
                  <div class="cart-table-left">
                     <h3>{{ __('text.cart') }}</h3>
                 
                     <div class="table-responsive cart_box">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>Preview</th>
                                 <th>{{ __('text.product_name') }}</th>
                                 <th>{{ __('text.price') }}</th>
                                 <th>{{ __('text.quantity') }}</th>
                                 <th>{{ __('text.total') }}</th>
                                 <th>{{ __('text.action') }}</th>
                              </tr>
                           </thead>
                           <tbody id="shop-cart-item" >
                        @php
                           $i=0;
                        @endphp
                        @foreach(Cart::content() as $row)
                                @php
                                    $prod = App\Models\Product::find($row->id) ;
                                @endphp
                        @if($prod)
                           
                              <tr class="shop-cart-item">
                                 <input type="hidden" id="product_id" value="{{ $prod->id }}">
                                 <input type="hidden" id="rowId" value="{{ $row->rowId }} ">
                                 <td class="fag-cart-preview">
                                    <a href="{{ route('product-page',[ 'id' => $row->id ]) }}">
                                    <img src="{{ $prod->ReturnLangPhoto() }}" alt="cart-1">
                                    </a>
                                 </td>
                                 <td class="fag-cart-product">
                                    <a href="{{ route('product-page',[ 'id' => $row->id ]) }}">
                                       <p>{{ $prod->ProductNameLang(session('locale')) }}</p>
                                    </a>
                                 </td>
                                 <td class="fag-cart-price">
                                    <p>{{ __('text.'.$prod->currency()) }} {{$prod->ChangeCurrValue()}}</p>
                                 </td>
                                 <td class="fag-cart-quantity">
                                    <div class="num-block skin-2">
                                       <div class="num-in">
                                          <span class="minus dis"></span>
                                          <input type="hidden" id="newQty" >
                                          <input type="text" class="in-num" id="quantity" value="{{ $row->qty }}" max="{{ number_format($prod->quantity,0) }}" readonly="">
                                          <span class="plus"></span>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="fag-cart-total">
                                    <p>{{ __('text.'.$prod->currency()) }} {{number_format(($row->qty*$prod->ChangeCurrValue()),2)}}</p>
                                 </td>
                                 <td class="fag-cart-close">
                                    <a href="javascript:void(0)" onclick="DeleteCart('{{ $row->rowId }}')"><i class="fa fa-times"></i></a>
                                 </td>
                              </tr>
                              @php
                                 $i += $prod->ChangeCurrValue()*$row->qty ;
                              @endphp
                           @endif
                        @endforeach
                           </tbody>
                        </table>
                     </div>
                     <div class="cart-clear">
                        <a href="javascript:void(0)" onclick="DestoryCart();">clear cart</a>
                        <a href="javascript:void(0)" id="UpdateCart" >update cart</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="order-summury-box">
                     <h3>Order Summury</h3>
                     <div class="summury-inn">
                        <table>
                           <tbody>
                              <tr>
                                 <td>{{ __('text.subtotal')}}</td>
                                 <td>@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format($i,2) }}</td>
                              </tr>
                              <tr>
                                 <td>Shipping and Handling</td>
                                 <td>Free Shipping</td>
                              </tr>
                              <tr>
                                 <td>{{ __('text.total') }}</td>
                                 <td>@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif  {{ number_format($i,2) }}</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="checkout-action">
                     <a href="{{ url('checkout') }}" class="fag-btn">{{ __('text.Checkout') }}<span></span></a>
                  </div>
               </div>
            </div>
             @else
            <center><div style="font-size: 22px" >{{ __('text.CartMsg') }}</div></center>
            <a href="{{ url('/') }}" class="fag-btn">{{ __('text.continue_shopping') }}<span></span></a>
            @endif
         </div>
      </section>
      <!-- Cart Page End -->
       
@endsection

<script type="text/javascript">
    document.getElementsByClassName('input-number')[0].oninput = function () {
        var max = parseInt(this.max);
        var min = parseInt(this.min);

        if (parseInt(this.value) > max) {
            this.value = max; 
        }
      
    }
</script>