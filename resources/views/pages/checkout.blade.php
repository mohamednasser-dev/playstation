@extends('layouts.app')
@section('content')

<!-- Breadcrumb Area Start -->
<section class="fag-breadcrumb-area">
     <div class="container">
        <div class="row">
           <div class="col-12">
              <div class="breadcromb-box">
                <h3>{{ __('text.Checkout') }}</h3>
                <ul>
                    <li><i class="fa fa-home"></i></li>
                    <li><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{ __('text.Checkout') }}</li>
                </ul>
              </div>
           </div>
        </div>
     </div>
</section>
<!-- Breadcrumb Area End -->
       
       
      <!-- Checkout Page Area Start -->
      <section class="checkout-page-area section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="checkout-left-box">
                     <h3>{{ __('text.Billing_Details') }}</h3>
                     <form action="{{ route('finish-orde',app()->getLocale()) }}" method="POST">
                        @csrf
                        <div class="row checkout-form">
                           <div class="col-md-12">
                              <input type="text" name="name" id="name23" value="{{ auth()->user()->name ?? '' }}" placeholder=" {{ __('text.Enter_Your') }} {{ __('text.fullname') }}" required>
                           </div>
                        </div>
                        <div class="row checkout-form">
                           <div class="col-md-6">
                              <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}"  placeholder="{{ __('text.Enter_Your') }} {{ __('text.email') }}" required id="info2">
                           </div>
                           <div class="col-md-6">
                              <input  type="text" name="phone" value="{{ auth()->user()->phone ?? '' }}" placeholder="{{ __('text.Enter_Your') }} {{ __('text.phone') }}" required id="info12">
                           </div>
                        </div>
                        
                        <div class="row checkout-form">
                           <div class="col-md-12">
                              <input  type="text" name="street" placeholder="{{ __('text.Street') }}" required="{{ __('text.Street') }}"  value="{{ auth()->user()->customerAddresses()->street ?? '' }}" id="addr2">
                           </div>
                        </div>
                        <div class="row checkout-form">
                           <div class="col-md-6">
                              <input type="text" name="building" placeholder="{{ __('text.builiding_no') }}" required="{{ __('text.builiding_no') }}" value="{{ auth()->user()->customerAddresses()->building ?? '' }}" id="Town2">
                           </div>

                           <div class="col-md-6">
                              <input  type="text" name="flatnumber" placeholder="{{ __('text.flat_plot') }}"  value="{{ auth()->user()->customerAddresses()->flatnumber ?? '' }}" id="cntr2">
                           </div>
                        </div>
                        
                        <div class="row checkout-form">
                           <div class="col-md-6">
                              <input  type="text" name="delivery_area" placeholder="{{ __('text.deliveryArea') }}" required="{{ __('text.deliveryArea') }}" value="{{ auth()->user()->customerAddresses()->delivery_area ?? '' }}" id="Town2">
                           </div>

                           <div class="col-md-6">
                              <input  type="text" name="landmark" placeholder="{{ __('text.landmark') }}"  value="{{ auth()->user()->customerAddresses()->landmark ?? '' }}" id="cntr2">
                           </div>
                        </div>
                        <div class="row checkout-form">
                           <div class="col-md-12">
                              <select class="form-control" size="1" name="country" required>
                                @foreach(\App\Models\Country::whereIn('id',['115','63','38','230'])->get() as $country)
                                    <option value="{{ $country->id }}" @if(!empty(auth()->user()->customerAddresses()->country))@if($country->id == auth()->user()->customerAddresses()->country ) selected @else @if($country->id == '115' ) selected @endif @endif @else @if($country->id == auth()->user()->country ) selected @endif @endif  >@if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                                @endforeach
                                    </select>
                           </div>
                        </div>
                     
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="order-summury-box">
                     <h3>{{ __('text.summery') }}</h3>
                     <div class="summury-inn">
                          
                            
                     
                      @php
                          $total = 0 ;
                      @endphp
                      @foreach($CheckoutProducts as $product)
                          <input type="hidden" name="products[]" id="products[]" value="{{ $product['product']->id }}_{{ $product['qty']}}">
                          @php
                              $total += number_format(($product['product']->ChangeCurrValue()*$product['qty']),2) ;
                          @endphp
                      @endforeach
                        <table>
                           <tbody>
                            <input type="hidden" name="currency" id="currency" value="@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif">
                              <tr>
                                 <td>{{ __('text.subtotal')}}</td>
                                 <td>@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format($total,2) }}</td>
                              </tr>
                              <tr>
                                 <td>Shipping and Handling</td>
                                 <td>Free Shipping</td>
                              </tr>
                              <tr>
                              <tr id="discount" style="display:none;color: red">
                                 <td>{{ __('text.Discount') }}</td>
                                 <td id="discountamount"  style="color: red"></td>
                              </tr>
                              <tr>
                                 <td>{{ __('text.total')}}</td>
                                 <input type="hidden" name="total_after_discount" id="total_after_discount">
                                 <td id="real_total">@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format($total,2) }}</td>
                                <input type="hidden" name="total" id="total" value="{{ number_format($total,2) }}">
                                <input type="hidden" name="discount_amount" id="discount_amount" value="0.00">
                              </tr>
                           </tbody>
                        </table>
                        <hr>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="coupon_voucher" id="coupon_voucher"  placeholder="{{ __('text.Enter_your_coupon_code') }}" ><br><i style="display: none;" id="coupon_delete" class="fa fa-trash"></i>
                          </div>
                            
                          <p id="coupon_respone" style="display: none;color:red"></p>
                              <center><a id="couponID" class="fag-btn-outline">{{ __('text.APPLY_COUPON') }}</a></center>
                     </div>
                  </div>
                  <div class="booking-right">
                     <div class="fag-payment clearfix">
                    @php
                        $labelLang='label_'.app()->getLocale();
                        $nameLang='name_'.app()->getLocale();
                    @endphp
                    @foreach(App\Models\Payment_Methods::where('status','1')->get() as $method)
                        <div class="payment">
                           <input type="radio" name="payment_method_id" id="payment-{{ $method->id }}" value="{{ $method->id }}"  @if($method->id == '1') checked="checked" @endif >
                           <label for="payment-{{ $method->id }}">{{ $method->$labelLang}}</label>
                           <div class="check">
                              <div class="inside"></div>
                           </div>
                        </div>
                    @endforeach 
                     </div>
                     <div class="action-btn">
                        <button type="submit" class="fag-btn">{{ __('text.Place_Order') }} <span></span></button>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- Checkout Page Area End -->
@endsection