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
                        <li  aria-current="page">{{ __('text.My_Orders') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section start -->
<section class="fag-game-page section_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <!--section start-->
        <section class="cart-section order-history section-b-space">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                    <tr class="table-head">
                        <!-- <th scope="col">{{__('text.PRODUCT')}}</th> -->
                        <th scope="col">{{__('text.Description')}}</th>
                        <th scope="col">{{__('text.total')}}</th>
                        <th scope="col">{{__('text.status')}}</th>
                        <th scope="col">{{__('text.detail')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $labelName = 'name_'.app()->getLocale() ;
                        @endphp
                    @foreach($orders as $order)
                    <tr>
                        <td><a href="{{ route('order-details',['id' => $order['order_id'],'language' => app()->getLocale() ]) }}">{{ __('text.order_no') }}: <span class="dark-data">{{ $order['order_no'] }}</span></a> 
                            
                        </td>
                        <td>
                            <h4>{{ __('text.'.$order['product']->currency()) }} {{ $order['total'] }}</h4>
                        </td>
                        <td>
                            <div class="responsive-data"> 
                                <h4 class="price">{{ __('text.'.$order['product']->currency()) }} {{ $order['product']->ChangeCurrValue() }}</h4>
                                 
                            </div>
                            <span class="dark-data">{{ $order['product']->Status($order['status']) }}</span> ({{ $order['created_at']->format('M d Y')}})
                        </td>
                        <td>
                            <span ><a href="{{ route('order-details',['id' => $order['order_id'],'language' => app()->getLocale() ]) }}" style="color: blue;">{{ __('text.display')}}</a></span> 
                        </td>
                        
                    </tr>
                    @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
        
    </div>
</section>

@endsection