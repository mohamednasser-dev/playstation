@extends('layouts.app')
@section('content')

<!-- breadcrumb start -->
<section class="fag-breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="breadcromb-box">
                    <h3>{{ __('text.dashboard') }}</h3>
                    <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li ><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li  aria-current="page">{{ __('text.Profile') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb End -->

<form class="theme-form" method="POST" action="{{ route('edit-profile',app()->getLocale()) }}">
                    @csrf
<!-- personal deatail section start -->
<section class="fag-game-page section_100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="title pt-0">{{ __('text.PERSONAL_DETAIL') }}</h3>
                
                <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="name">{{ __('text.fullname') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('text.Enter_Your') }} {{ __('text.fullname') }}" required="{{ __('text.fullname') }}" value="{{ auth()->user()->name ?? '' }}">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="review">{{ __('text.phone')}}</label>
                            <input type="text" class="form-control" name="phone" placeholder="{{ __('text.Enter_Your') }} {{ __('text.phone')}}" required="{{ __('text.phone')}}" value="{{ auth()->user()->phone ?? '' }}" >
                        </div>
                        <div class="col-md-6">
                            <label for="email">{{ __('text.email') }}</label>
                            <input type="text" class="form-control" name="email"  placeholder="{{ __('text.Enter_Your') }} {{ __('text.email') }}" required="{{ __('text.email') }}" value="{{ auth()->user()->email ?? '' }}" readonly="readonly">
                        </div>
                        <div class="col-md-6">
                            <label for="review">{{ __('text.Country') }} </label>
                            <select class="form-control" size="1" name="country">
                            @foreach(\App\Models\Country::whereIn('id',['115','18','176','191','163'])->get() as $country)
                                <option value="{{ $country->id }}" @if(auth()->user()->country == $country->id) selected @elseif($country->id == '115') selected @endif> @if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                            @endforeach
                            </select>
                        </div>
                        
                    </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- address section start -->
<section class="checkout-page-area section_100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="title pt-0">{{ __('text.SHIPPING_ADDRESS') }}</h3>
                
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="email">{{ __('text.builiding_no') }} <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="building" name="building" placeholder="{{ __('text.builiding_no') }}" required="{{ __('text.builiding_no') }}" value="{{ auth()->user()->customerAddresses()->building ?? '' }}">
                        </div>
                        <input type="hidden" name="address_id" value="{{ auth()->user()->customerAddresses()->id ?? '' }}">
                        <div class="col-md-6">
                            <label for="name">{{ __('text.Street') }} <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="{{ __('text.Street') }}" required="{{ __('text.Street') }}" value="{{ auth()->user()->customerAddresses()->street ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="name">{{ __('text.flat_plot') }} </label>
                            <input type="text" class="form-control" id="flatnumber" name="flatnumber" placeholder="{{ __('text.flat_plot') }}"  value="{{ auth()->user()->customerAddresses()->flatnumber ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label for="review">{{ __('text.deliveryArea') }} <span style="color:red">*</span></label>
                             <input type="text" class="form-control" id="delivery_area" name="delivery_area" placeholder="{{ __('text.flat_plot') }}" required="{{ __('text.deliveryArea') }}" value="{{ auth()->user()->customerAddresses()->delivery_area ?? '' }}" >
                        </div>
                        <div class="col-md-6">
                            <label for="review">{{ __('text.landmark') }} </label>
                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="{{ __('text.landmark') }}" value="{{ auth()->user()->customerAddresses()->landmark ?? '' }}">
                        </div>
                       <!--  <div class="col-md-6">
                            <label for="review">{{ __('text.City') }} <span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="{{ __('text.City') }}" required="{{ __('text.City') }}">
                        </div> -->
                        
                        <div class="col-md-6 select_input">
                            <label for="review">{{ __('text.Country') }} <span style="color:red">*</span></label>
                            <select class="form-control" size="1" name="country">
                            @foreach(\App\Models\Country::whereIn('id',['115','18','176','191','163'])->get() as $country)
                                <option value="{{ $country->id }}" @if(auth()->user()->customerAddresses()->country == $country->id) selected="selected" @elseif($country->id == '115') selected  @endif>@if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                        <label style="visibility: hidden;">sss</label>
                        <div class="col-md-12">
                            <button class="fag-btn" type="submit">{{ __('text.Save_setting') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
</form>
@endsection