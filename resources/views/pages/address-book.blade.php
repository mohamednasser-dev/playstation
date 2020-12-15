@extends('layouts.app')

@section('content')

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
                        <li  aria-current="page">{{ __('text.Address') }}</li>
                    </ul>
                </div>
        </div>
    </div>
</section>
<!-- breadcrumb End -->

<!-- section start -->
<section class="fag-game-page section_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(!empty(auth()->user()->Addresses()))
                    @foreach(auth()->user()->Addresses() as $address)
                            <h2> @if($address->landmark != '') {{ __('text.landmark')}} : {{ $address->landmark}} , @endif @if($address->flatnumber != ''){{ __('text.flat_plot')}} : {{ $address->flatnumber}} ,@endif {{ __('text.Street')}} :{{ $address->street}}  <br> {{ __('text.builiding_no')}} : {{ $address->building}} , {{ __('text.deliveryArea')}} : {{ $address->delivery_area}} <br> {{ auth()->user()->CountryName($address->country)}}</h2>
                        <a href="#" data-toggle="modal" data-target="#{{ $address->id}}">{{ __('text.Edit') }}</a>
                    @endforeach
                @else
                    <p>You Don't have any addresses yet.</p>
                @endif
                    <hr>
                        <div class="box-account box-info">
                            
                            <div>
                                <div class="box">
                                        <a href="#" data-toggle="modal" data-target="#NewAddress">{{ __('text.Manage_Addresses') }}</a></div>
                                    
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</section>





<!-- Modal -->
<div class="modal fade" id="newsletter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4> {{ __('text.Newsletter') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="subscribe-content">
                        
                        <form class="form-inline subscribe-form" action="{{route('newsletter-sub',app()->getLocale()) }}" method="post">
                            @csrf
                            @if(auth()->user()->newsletter == '0')
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="{{ __('text.email') }}..." value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="sub" value="1">
                            @else
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="{{ __('text.email') }}..." value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="sub" value="0">
                            @endif
                            @if(auth()->user()->newsletter == '0')
                                <button type="submit" class="btn btn-solid">{{ __('text.subscribe') }}</button>
                            @else
                                <button type="submit" class="btn btn-solid">{{ __('text.unsubscribe') }}</button>
                            @endif
                        </form>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('text.close') }}</button>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="NewAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4> {{ __('text.New_Address_Book') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="subscribe-content">
                       
                        <form class="theme-form" action="{{route('new-address',app()->getLocale()) }}" method="post">
                            @csrf
                                    
                                <div class="form-row">
                                    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                                    
                                    <div class="col-md-6">
                                        <label for="email">{{ __('text.builiding_no') }} <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="building" name="building" required placeholder="{{ __('text.builiding_no') }}" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">{{ __('text.Street') }} <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="street" name="street" placeholder="{{ __('text.Street') }}" required="{{ __('text.Street') }}" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">{{ __('text.flat_plot') }} </label>
                                        <input type="text" class="form-control" id="flatnumber" name="flatnumber" placeholder="{{ __('text.flat_plot') }}"  >
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="review">{{ __('text.deliveryArea') }} <span style="color:red">*</span></label>
                                         <input type="text" class="form-control" id="delivery_area" name="delivery_area" required placeholder="{{ __('text.deliveryArea') }}" required="{{ __('text.deliveryArea') }}" value="" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">{{ __('text.landmark') }} </label>
                                        <input type="text" class="form-control" id="landmark" name="landmark" placeholder="{{ __('text.landmark') }}"  value="">
                                    </div>
                                    
                                    <div class="col-md-6 select_input">
                                        <label for="review">{{ __('text.Country') }} <span style="color:red">*</span></label>
                                        <select class="form-control" size="1" name="country">
                                        @foreach(\App\Models\Country::whereIn('id',['115','18','176','191','163'])->get() as $country)
                                            <option value="{{ $country->id }}" @if(auth()->user()->country == $country->id) selected @elseif($country->id == '115') selected @endif >@if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                                        @endforeach
                                        </select>
                                    </div>
                                   
                                </div>
                                    
                                </div>
                                <br>
                                <button type="submit" class="btn btn-solid">{{ __('text.save') }}</button>
                            
                        </form>
                   
                    </div>
                  </div>
                 
                </div>
              </div>
        </div>

@if(!empty(auth()->user()->Addresses()))
    @foreach(auth()->user()->Addresses() as $address)
        <div class="modal fade" id="{{ $address->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4> {{ __('text.Address_Book') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="subscribe-content">
                       
                        <form class="theme-form" action="{{route('edit-address',app()->getLocale()) }}" method="post">
                            @csrf
                                    
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="email">{{ __('text.builiding_no') }} <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="building" name="building" placeholder="{{ __('text.builiding_no') }}" required  value="{{ $address->building ?? '' }}">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="name">{{ __('text.Street') }} <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="street" name="street" placeholder="{{ __('text.Street') }}" required="{{ __('text.Street') }}" value="{{ $address->street ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">{{ __('text.flat_plot') }} </label>
                                        <input type="text" class="form-control" id="flatnumber" name="flatnumber" placeholder="{{ __('text.flat_plot') }}"  value="{{ $address->flatnumber ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">{{ __('text.deliveryArea') }}</label>
                                         <input type="text" class="form-control" id="delivery_area" name="delivery_area" placeholder="{{ __('text.flat_plot') }}" required="{{ __('text.deliveryArea') }}" value="{{ $address->delivery_area ?? '' }}" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">{{ __('text.landmark') }} </label>
                                        <input type="text" class="form-control" id="landmark" name="landmark" placeholder="{{ __('text.landmark') }}"  value="{{ $address->landmark ?? '' }}">
                                    </div>
                                    
                                    <div class="col-md-6 select_input">
                                        <label for="review">{{ __('text.Country') }} <span style="color:red">*</span></label>
                                        <select class="form-control" size="1" name="country">
                                        @foreach(\App\Models\Country::whereIn('id',['115','18','176','191','163'])->get() as $country)
                                            <option value="{{ $country->id }}" @if(auth()->user()->country == $country->id) selected @endif>@if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                                        @endforeach
                                        </select>
                                    </div>
                                   
                                </div>
                                    
                                </div>
                                <input type="hidden" name="address_id" value="{{ $address->id }}">
                                <br>
                                <button type="submit" class="btn btn-solid">{{ __('text.save') }}</button>
                            
                        </form>
                   
                    </div>
                  </div>
                 
                </div>
              </div>
        </div>
        @endforeach
    @endif

@endsection