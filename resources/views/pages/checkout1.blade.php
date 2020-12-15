@extends('layouts.app')
@section('content')

<!-- breadcrumb start -->
<section class="breadcrumb-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2>{{ __('text.Checkout') }}</h2>
                </div>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">{{ __('text.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('text.Checkout') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form action="{{ route('finish-orde') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>{{ __('text.Billing_Details') }}</h3></div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.fullname') }} <span style="color:red">*</span></div>
                                    <input type="text" name="name" value="{{ auth()->user()->name ?? '' }}" placeholder=" {{ __('text.Enter_Your') }} {{ __('text.fullname') }}" required value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.phone')}} <span style="color:red">*</span></div>
                                    <input type="number" min="0" name="phone" value="{{ auth()->user()->phone ?? '' }}" placeholder="{{ __('text.Enter_Your') }} {{ __('text.phone') }}" required value="{{ old('phone') }}">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('text.email') }} <span style="color:red">*</span></div>
                                    <input type="text" name="email" value="{{ auth()->user()->email ?? '' }}"  placeholder="{{ __('text.Enter_Your') }} {{ __('text.email') }}" required value="{{ old('email') }}">

                                    @if(session()->has('msg'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('msg') }}
                                                </div>
                                    @endif 
                                </div>
								 @auth
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">{{ __('text.Lang_Address') }} <span style="color:red">*</span></div>
                                <select class="form-control" size="1" name="address_id" required>
                 @foreach(\App\Models\Customer_Addresses::where('customer_id', auth()->user()->id)->get() as $address)
                             <option value="{{ $address->id }}" > {{$address->street }}, {{$address->building }}</option>
                                    @endforeach
                                </select>
                            </div>
						@endauth
						<button type="button" class="btn-solid btn">{{ __('text.Manage_Addresses')}} </button>
								
						<div style="display:none" id="adddress">		
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="field-label">{{ __('text.Country') }} <span style="color:red">*</span></div>
                                <select class="form-control" size="1" name="country" required>
                                    @foreach(\App\Models\Country::whereIn('id',['115'])->get() as $country)
                                        <option value="{{ $country->id }}" >@if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                                    @endforeach
                                </select>
                            </div>
                            @auth
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.deliveryArea') }} <span style="color:red">*</span></div>
                                    <input type="text"  name="delivery_area" placeholder="{{ __('text.deliveryArea') }}" required="{{ __('text.deliveryArea') }}" value="{{ auth()->user()->customerAddresses()->delivery_area ?? '' }}">
                                </div>
                            @else
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.deliveryArea') }} <span style="color:red">*</span></div>
                                    <input type="text"  name="delivery_area" placeholder="{{ __('text.deliveryArea') }}" placeholder="{{ __('text.delivery_area') }}" required="{{ __('text.deliveryArea') }}" value="{{ old('delivery_area') }}">
                                </div>
                            @endauth
                            

                            @auth
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('text.Street') }} <span style="color:red">*</span></div>
                                    <input type="text" name="street" placeholder="{{ __('text.Street') }}" required="{{ __('text.Street') }}" value="@auth {{ auth()->user()->customerAddresses()->street ?? '' }} @endauth">
                                </div>
                            @else
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('text.Street') }} <span style="color:red">*</span></div>
                                    <input type="text" name="street" placeholder="{{ __('text.Street') }}" required="{{ __('text.Street') }}" value="{{ old('street') }}">
                                </div>
                            @endauth
                            
                            @auth 
                                <input type="hidden" name="address_id" value="{{ auth()->user()->customerAddresses()->id ?? '' }}">
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.builiding_no') }} <span style="color:red">*</span></div>
                                    <input type="text" name="building" placeholder="{{ __('text.builiding_no') }}" required="{{ __('text.builiding_no') }}" value="{{ auth()->user()->customerAddresses()->building ?? '' }} ">
                                </div>
                            @else
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.builiding_no') }} <span style="color:red">*</span></div>
                                    <input type="text" name="building" placeholder="{{ __('text.builiding_no') }}" required="{{ __('text.builiding_no') }}" value="{{ old('building') }}">
                                </div>
                            @endauth

                            @auth
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('text.flat_plot') }}</div>
                                    <input type="text" name="flatnumber" placeholder="{{ __('text.flat_plot') }}"  value="@auth {{ auth()->user()->customerAddresses()->flatnumber ?? '' }}@endauth">
                                </div>
                            @else
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">{{ __('text.flat_plot') }}</div>
                                    <input type="text" name="flatnumber" placeholder="{{ __('text.flat_plot') }}" value="{{ old('flatnumber') }}">
                                </div>
                            @endauth

                            

                            @auth
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.landmark') }} </div>
                                    <input type="text"  id="landmark" name="landmark" placeholder="{{ __('text.landmark') }}"  value="@auth {{ auth()->user()->customerAddresses()->landmark ?? '' }} @endauth">
                                </div>
                            @else
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">{{ __('text.landmark') }} </div>
                                    <input type="text"  id="landmark" name="landmark" placeholder="{{ __('text.landmark') }}"  value="{{ old('landmark') }}">
                                </div>
                            @endauth

                                
                                <!-- <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="checkbox" name="shipping-option" id="account-option"> &ensp;
                                    <label for="account-option">Create An Account?</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <center><div>{{ __('text.PRODUCT')}} <span>{{__('text.total')}}</span></div></center>
                                    </div>
                                    <ul class="qty">

                                        @php
                                            $total = 0 ;
                                        @endphp
                                        @foreach($CheckoutProducts as $product)
                                        
                                   
                                            <input type="hidden" name="products[]" id="products[]" value="{{ $product['product']->id }}_{{ $product['qty']}}">
                                            <li>{{ $product['product']->ProductNameLang(app()->getLocale()) }}  x  {{ $product['qty']}} <span>{{ __('text.'.$product['product']->currency()) }} {{ number_format(($product['product']->ChangeCurrValue()*$product['qty']),2) }}</span></li>
                                            @php
                                                $total += number_format(($product['product']->ChangeCurrValue()*$product['qty']),2) ;
                                            @endphp
                                        @endforeach
                                    </ul>
                                    
                                    <ul class="total">
                                        <input type="hidden" name="currency" id="currency" value="@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif">
                                        <li>{{ __('text.subtotal')}} <span class="count">@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format($total,2) }}</span></li>
                                        <li><ul class="sub-total">
                                        
                                         <li>{{ __('text.shipping')}}
                                            <div class="shipping">
                                        @php
                                            $shipping = App\Models\Stores::first() ;

                                        @endphp
                                        @if($total >= $shipping->free_shipping)
                                                <div class="shopping-option">
                                                    <label for="free-shipping">{{ __('text.Free_Shipping') }}</label>
                                                </div>
                                                @php
                                                    $fee = 0 ;
                                                @endphp
                                        @else
                                                @php
                                                    $fee = $shipping->shipping ;
                                                @endphp
                                                <div class="shopping-option">
                                                    <label for="local-pickup">@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format($shipping->shipping,2) }} </label>
                                                </div> 
                                        @endif
                                            </div>
                                        </li> 
                                    </ul></li>
                                        <li id="discount" style="display:none;color: red">{{ __('text.Discount') }}<span class="count" id="discountamount"  style="color: red"></li>
                                        <li>{{ __('text.total')}} <span class="count" id="real_total"><input type="hidden" name="total_after_discount" id="total_after_discount">@if(!empty($_COOKIE['country-curr']) ) {{ __('text.'.$_COOKIE['country-curr']) }} @else {{ __('text.KWD') }} @endif {{ number_format(($total+$fee),2) }}</span></li>
                                        <input type="hidden" name="total" id="total" value="{{ ($total+$fee) }}">
                                        <input type="hidden" name="discount_amount" id="discount_amount" value="0.00">
                                    </ul>
                                    <hr>
                                    <ul>
                                        <!-- <form class="form-inline subscribe-form" action="" method="post">
                                            @csrf -->

                                            <div class="form-group ">
                                                <input type="text" class="form-control" name="coupon_voucher" id="coupon_voucher"  placeholder="{{ __('text.Enter_your_coupon_code') }}" ><br><i style="display: none;" id="coupon_delete" class="fa fa-trash"></i>
                                                <p id="coupon_respone" style="display: none;color:red"></p>
                                            </div>
                                            @auth 
                                                <a id="couponID" class="btn btn-solid">{{ __('text.APPLY_COUPON') }}</a>
                                            @else
                                                <a onclick="RedirectLogin()" class="btn btn-solid">{{ __('text.APPLY_COUPON') }}</a>
                                            @endauth
                                        <!-- </form> -->
                                    </ul>
                                </div>
                               
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                            @php
                                              $labelLang='label_'.app()->getLocale();
                                              $nameLang='name_'.app()->getLocale();
                                            @endphp
                                            @foreach(App\Models\Payment_Methods::where('status','1')->get() as $method)
                                                <li>
                                                    <div class="radio-option">

                                                       <!-- <input type="radio"   name="payment_method_id" id="payment-{{ $method->id }}" value="{{ $method->id }}"  @if($method->id == '1') checked="checked" @endif  @if($method->id == '2') data-toggle="modal" data-target="#VisaDetails" @endif>-->
														 <input type="radio"   name="payment_method_id" id="payment-{{ $method->id }}" value="{{ $method->id }}">
                                                        <label for="payment-{{ $method->id }}">{{ ucfirst($method->$labelLang)}}</label>
                                                    </div>
                                                </li>
                                            @endforeach  
                                                <!-- <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment-group" id="payment-3">
                                                        <label for="payment-3">PayPal<span class="image"><img src="../assets/images/paypal.png" alt=""></span></label>
                                                    </div>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
								
                                    <div class="text-right"><button type="submit" class="btn-solid btn">{{ __('text.Place_Order') }}</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->


<div class="modal fade" id="VisaDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <div class="col-12">
            <div id="pay-invoice" class="card">
                <div class="card-body">
                    
                    <hr>
                    <form action="" method="post" novalidate="novalidate">
                        <input type="hidden" id="x_first_name" name="x_first_name" value="">
                        <input type="hidden" id="x_last_name" name="x_last_name" value="">
                        <input type="hidden" id="x_card_num" name="x_card_num" value="">
                        <input type="hidden" id="x_exp_date" name="x_exp_date" value="">
                        <div class="form-group text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                            </ul>
                        </div>
                        
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label">Name on card</label>
                            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label">Card number</label>
                            <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label">Expiration</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY" autocomplete="cc-exp">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label">Security code</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    <div class="input-group-addon">
                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" 
                                        data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>"
                                        data-trigger="hover"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="x_zip" class="control-label">Postal code</label>
                            <input id="x_zip" name="x_zip" type="text" class="form-control" value="" data-val="true" data-val-required="Please enter the ZIP/Postal code" autocomplete="postal-code">
                            <span class="help-block" data-valmsg-for="x_zip" data-valmsg-replace="true"></span>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Pay</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

@endsection