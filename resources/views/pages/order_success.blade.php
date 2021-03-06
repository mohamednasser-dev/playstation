@extends('layouts.app')
@section('content')

<!-- thank-you section start -->
<section class="fag-breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>{{ __('text.thank_you') }}</h2>
                    <p>{{ __('text.PaymentText') }}</p>
                    <p>{{ __('text.Transaction_ID') }}: {{ $order_no->order_number }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- order-detail section start -->
<section class="fag-game-page section_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    <h3 class="title pt-0">{{ __('text.your_order_details') }}</h3>
                @foreach($order_products as $product)
                    <div class="row product-order-detail">
                        <div class="col-3"><img src="{{ $product['product']->ReturnLangPhoto() }}" alt="" class="img-fluid "></div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>{{ __('text.product_name') }}</h4>
                                <h5>{{ $product['product']->ProductNameLang(app()->getLocale()) }}</h5></div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>{{ __('text.quantity') }}</h4>
                                <h5>{{ $product['qty'] }}</h5></div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>{{ __('text.price') }}</h4>
                                <h5>{{ $product['product']->currency() }} {{ $product['product']->ChangeCurrValue()*$product['qty'] }}</h5></div>
                        </div>
                    </div>
                @endforeach
                <hr style="color: white">
                    <div class="total-sec">
                        <ul>
                            <li>{{ __('text.subtotal') }} <span>{{ $order_no->currency() }} {{ $order_no->OrderSubTotal()}}</span></li>
                        @if($order_no->store_level_discount_code_id != '')
                            <li>{{ __('text.Discount') }} <span>{{ $order_no->currency() }} {{ $order_no->total_discount_amount()}}</span></li>
                        @endif
                            <li>{{ __('text.shipping') }} <span>{{ $order_no->currency() }} 0.00</span></li>
                            <!-- <li>tax(GST) <span>SAR 10.00</span></li> -->
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>{{ __('text.total') }} <span>{{ $order_no->currency() }} {{ $order_no->OrderTotal()}}</span></h3></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row order-success-sec">
                    <div class="col-sm-6">
                        <h4>{{ __('text.summery') }}</h4>
                        <ul class="order-detail">
                            <li>{{ __('text.Transaction_ID') }}:  {{ $order_no->order_number }}</li>
                            <li>{{ __('text.Order_Date') }}: {{ $order_no->created_at->format('M d Y') }}</li>
                            <li>{{ __('text.Order_Total')  }}: {{ $order_no->currency() }} {{ $order_no->OrderTotal()}}</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>{{ __('text.SHIPPING_ADDRESS') }}</h4>
                        <ul class="order-detail">
                            <li>{{ $address['building'] }}</li>
                            <li>{{ $address['street'] }}</li>
                            <li>{{ $address['flatnumber'] }}</li>
                            <li>{{ $address['delivery_area'] }}</li>
                            <li>{{ $address['landmark'] }}</li>
                            <li>{{ $country_name }}</li>
                            <li>{{ __('text.Contact_No') }}. {{ $contact_no}}</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 payment-mode">
                        <h4>{{ __('text.payment_method') }}</h4>
                        <p>@if($order_no->payment_method_id == '1') {{ __('text.cash') }} @else {{ __('text.visa') }} @endif</p>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="delivery-sec">
                            <h3>expected date of delivery</h3>
                            <h2>october 22, 2020</h2></div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

@endsection