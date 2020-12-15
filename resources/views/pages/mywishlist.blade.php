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
                            <li class="active"><a href="{{route('home',app()->getLocale())}}">{{ __('text.Account_Info') }}</a></li>
                            <li><a href="{{ url(app()->getLocale(),'address-book') }}">{{ __('text.Address_Book') }}</a></li>
                            <li><a href="{{ url(app()->getLocale(),'order-history') }}">{{ __('text.My_Orders') }}</a></li>
                            <li><a href="#">{{ __('text.My_Wishlist') }}</a></li>
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
                    <!--section start-->
    @if(count($wishlists) > 0)
        <section class="cart-section order-history section-b-space">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <th scope="col">{{__('text.PRODUCT')}}</th>
                        <th scope="col">{{ __('text.product_name')}}</th>
                        <th scope="col">{{ __('text.price') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($wishlists as $wishproduct)
                    @php
                        $product = App\Models\Product::find($wishproduct->product_id) 
                    @endphp
                    <tr>
                        <td>
                            <a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">
                            <img alt="" class="mr-3" src="{{$product->ReturnLangPhoto()}}">
                        </a>
                        </td>
                        <td><a href="#"><span class="dark-data">{{ $product->ProductNameLang(app()->getLocale()) }}</span></a>
                            
                        </td>
                        <td>
                            <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4></td>
                        <td>
                            
                            <span><a href="" onclick="DeleteWishlist('{{ $wishproduct->id }}')">X</a></span>
                        </td>
                       
                    </tr>
                    @endforeach
                    </tbody>
                    
                </table>
            </div>
        </section>
        @else
            <center><p>{{ __('text.wishlistMsg') }}</p></center>
        @endif
        </div>
        
    </div>
</section>

@endsection