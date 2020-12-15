@extends('layouts.app')

@section('content')

<section class="breadcrumb-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2>{{ __('text.dashboard') }}</h2>
                </div>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('text.dashboard') }}</li>
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
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">{{ __('text.my_account') }}</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> {{ __('text.back') }}</span></div>
                    <div class="block-content">
                        <ul>
                            <li class="active"><a href="#">{{ __('text.Account_Info') }}</a></li>
                            <li><a href="{{ url(app()->getLocale(),'address-book') }}">{{ __('text.Address_Book') }}</a></li>
                            <li><a href="{{ url(app()->getLocale(),'order-history') }}">{{ __('text.My_Orders') }}</a></li>
                            <li><a href="{{ url(app()->getLocale(),'My_Wishlist') }}">{{ __('text.My_Wishlist') }}</a></li>
                            <!-- <li><a href="#">{{ __('text.Newsletter') }}</a></li>
                            <li><a href="#">{{ __('text.my_account')}}</a></li> -->
                            <li><a href="{{ url(app()->getLocale(),'change_password') }}">{{ __('text.Change_Password') }}</a></li>
                            <li class="last"><a  href="{{ route('logout',app()->getLocale()) }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('text.LogOut') }}</a> <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" style="display: none;">
                                        @csrf</form></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>{{ __('text.dashboard') }}</h2></div>
                        <div class="welcome-msg">
                            <p>{{ __('text.Hello')}}, {{ auth()->user()->name }} !</p>
                            <p>{{ __('text.dashboardmessage') }}.</p>
                        </div>
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>{{ __('text.Account_Info') }}</h2></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <!-- <div class="box-title">
                                            <h3>{{ __('text.Contact_Information') }}</h3><a href="#" data-toggle="modal" data-target="#contactinfo">{{ __('text.Edit') }}</a></div> -->
                                        <div class="box-content">
                                            <h6>{{ auth()->user()->name }}</h6>
                                            <h6>{{ auth()->user()->email }}</h6>
                                            <h6>{{ auth()->user()->CountryName(auth()->user()->country) }}</h6> 
                                            <h6><a href="{{ url(app()->getLocale(),'profile')}}" >{{ __('text.Edit') }} {{ __('text.Profile') }} </a></h6></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="box-title">
                                            <h3>{{ __('text.Newsletter') }}</h3> 
                                            @if(session()->has('message'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                <a href="#" data-toggle="modal" data-target="#newsletter">{{ __('text.Edit') }}</a>
                                        </div>
                                        <div class="box-content">
                                        @if(auth()->user()->getNewsletter() == '0')
                                            <p>{{ __('text.newsletterunsubscribe') }}.</p>
                                        @else
                                            <p>{{ __('text.newslettersubscribe') }}.</p>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box">
                                    <div class="box-title">
                                        <h3>{{ __('text.Address_Book') }}</h3></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6>{{ __('text.Default_Billing_Address') }}</h6><address>
                                        @if(!empty(auth()->user()->Default_Addresses()))
                                        <br>
                                        <p>{{ auth()->user()->Default_Addresses()->street}} , {{ auth()->user()->CountryName(auth()->user()->Default_Addresses()->country)}}</p>
                                            <br><a href="#" data-toggle="modal" data-target="#defaultAddress">{{ __('text.Edit') }}</a>

                                        @else
                                            You have not set a default billing address.<br><a href="#" data-toggle="modal" data-target="#defaultAddress">{{ __('text.Edit') }}</a>
                                        @endif </address></div>
                                        <div class="col-sm-6">
                                            <h6>{{ __('text.Default_Shipping_Address') }}</h6><address>

                                        @if(!empty(auth()->user()->Default_Addresses()))
                                        <br>
                                        <p>{{ auth()->user()->Default_Addresses()->street}} , {{ auth()->user()->CountryName(auth()->user()->Default_Addresses()->country)}}</p>
                                            <br><a href="#" data-toggle="modal" data-target="#defaultAddress">{{ __('text.Edit') }}</a>
                                        @else
                                           You have not set a default shipping address.<br><a href="#" data-toggle="modal" data-target="#defaultAddress">{{ __('text.Edit') }}</a>
                                        @endif </address></div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        
                        <form class="theme-form" action="{{route('newsletter-sub',app()->getLocale()) }}" method="post">
                            @csrf
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="email" placeholder="{{ __('text.email') }}..." value="{{ auth()->user()->email }}" >
                                </div>
                                <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="sub" value="0">
                            
                            <br>
                            @if(auth()->user()->getNewsletter() == 1)
                                <button type="submit" class="btn btn-solid">{{ __('text.unsubscribe') }}</button>
                            @else
                                <button type="submit" class="btn btn-solid">{{ __('text.subscribe') }}</button>
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

<!-- Modal -->
<div class="modal fade" id="defaultAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        
        @if(count(auth()->user()->Addresses() ) > 0 )     
            <form class="theme-form" action="{{route('set-default-address',app()->getLocale()) }}" method="post">
                @csrf
                <div class="form-group mb-0">
                    @foreach(App\Models\Customer_Addresses::where('customer_id',auth()->user()->id)->get() as $address )
                        
                            <label><input type="radio"   name="default" value="{{ $address->id }}" @if($address->is_default == '1') checked @endif /> &nbsp;&nbsp; {{ $address->building }} &nbsp;&nbsp;, &nbsp;&nbsp; {{ $address->street }} &nbsp;&nbsp; , &nbsp;&nbsp; {{ $address->flatnumber }} &nbsp;&nbsp;,&nbsp;&nbsp; {{ auth()->user()->CountryName($address->country) }} </label>
                            <br>
                        
                    @endforeach
                    </div>
                    <input type="hidden" name="customer_id" value="{{ auth()->user()->id }}">
                <br>
                    <button type="submit" class="btn btn-solid">{{ __('text.save') }}</button>
                
            </form>
        @else
            <p>No Address Added Yet</p>
        @endif
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('text.close') }}</button>
      </div>
    </div>
  </div>
</div>


@endsection