@extends('layouts.app')
@section('content')


      <!-- Slider Area Start -->
      <section class="slider-area">
         <div class="fag-slide owl-carousel">
            @php 
              $name='photo_'.app()->getLocale(); 
            @endphp
         @foreach(App\Models\Slider::all() as $slider)
            <img src="{{ ImagePath().$slider->$name  }}" class="bg-img " alt="">
         @endforeach
         </div>
      </section>
      <!-- Slider Area End -->
       
       
      <!-- Games Area Strat -->
      <section class="fag-games-area section_140">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">our <span>games</span></h2>
                     <!-- <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p> -->
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <div class="games-masonary">
                     <div class="projectFilter project-btn">
                        <ul>
                           <li><a data-filter="*" class="current">{{ __('text.All') }}</a></li>
                           <li><a data-filter=".offer">{{ __('text.Offers') }}</a></li>
                           <li><a data-filter=".latest" >{{ __('text.Latest_products') }}</a></li>
                           <li><a data-filter=".best">{{ __('text.Best_seller') }}</a></li>
                        </ul>
                     </div>
                     <div class="clearfix gamesContainer">
                     @foreach($products as $product)
                        <div class="games-item latest">
                           <div class="games-single-item img-contain-isotope">
                              <div class="games-thumb">
                                    <a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">
                                    <img src="{{$product->ReturnLangPhoto()}}" alt="games" />
                                    </a>
                              </div>
                              <div class="games-desc">
                                 <h3><a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">@if(strlen($product->ProductNameLang(app()->getLocale()) ) <= 20){{ $product->ProductNameLang(app()->getLocale()) }}@else {{ substr($product->ProductNameLang(app()->getLocale()),0,20) . '...' }} @endif</a></h3>
                                 <!-- <p class="game-meta">Action | Desktop</p> -->
                                 <p class="game-meta">{{ __('text.Release_date') }}:<span>{{ $product->created_at->format('M d Y') }}</span></p>
                                 <div class="game-action">
                                    <div class="game-price">
                                       <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                                       @if($product->sale_amount_excluding_tax != '0.00')
                                          @if(app()->getLocale() =='en')
                                             <p class="off">{{$product->getSalePrecentage()}} % OFF</p>
                                          @else
                                             <p class="off">{{$product->getSalePrecentage()}} % </p>
                                          @endif
                                       @endif
                                    </div>
                                    <div class="game-buy">
                                       @if($product->quantity > '0')
                                          <a href="javascript:void(0)" onclick="AddCart2('{{ $product->id }}','1')" class="fag-btn-outline">{{ __('text.add_to_cart') }}!</a>
                                       @else
                                          <a href="javascript:void(0)" onclick="PutId('{{ $product->id }}')" data-toggle="modal" data-target="#informmsg" class="fag-btn-outline">{{ __('text.cartnotenoughmsg') }}!</a>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end game item -->
                     @endforeach

                     @foreach($offers as $product)
                        <div class="games-item offer">
                           <div class="games-single-item img-contain-isotope">
                              <div class="games-thumb">
                                    <a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">
                                    <img src="{{$product->ReturnLangPhoto()}}" alt="games" />
                                    </a>                                 
                              </div>
                              <div class="games-desc">
                                 <h3><a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">@if(strlen($product->ProductNameLang(app()->getLocale()) ) <= 20){{ $product->ProductNameLang(app()->getLocale()) }}@else {{ substr($product->ProductNameLang(app()->getLocale()),0,20) . '...' }} @endif</a></h3>
                                 <!-- <p class="game-meta">Action | Desktop</p> -->
                                 <p class="game-meta">{{ __('text.Release_date') }}:<span>{{ $product->created_at->format('M d Y') }}</span></p>
                                 <div class="game-action">
                                    <div class="game-price">
                                       <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                                       @if($product->sale_amount_excluding_tax != '0.00')
                                          @if(app()->getLocale() =='en')
                                             <p class="off">{{$product->getSalePrecentage()}} % OFF</p>
                                          @else
                                             <p class="off">{{$product->getSalePrecentage()}} % </p>
                                          @endif
                                       @endif
                                    </div>
                                    <div class="game-buy">
                                       @if($product->quantity > '0')
                                          <a href="javascript:void(0)" onclick="AddCart2('{{ $product->id }}','1')" class="fag-btn-outline">{{ __('text.add_to_cart') }}!</a>
                                       @else
                                          <a href="javascript:void(0)" onclick="PutId('{{ $product->id }}')" class="fag-btn-outline" data-toggle="modal" data-target="#informmsg">{{ __('text.cartnotenoughmsg') }}!</a>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end game item -->
                     @endforeach

                     @foreach($bestseller as $productbest)
                     @php
                         $product = App\Models\Product::find($productbest->product_id) 
                     @endphp
                        <div class="games-item best">
                           <div class="games-single-item img-contain-isotope">
                              <div class="games-thumb">
                                    <a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">
                                    <img src="{{$product->ReturnLangPhoto()}}" alt="games" />
                                    </a>                                 
                              </div>
                              <div class="games-desc">
                                 <h3><a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">@if(strlen($product->ProductNameLang(app()->getLocale()) ) <= 20){{ $product->ProductNameLang(app()->getLocale()) }}@else {{ substr($product->ProductNameLang(app()->getLocale()),0,20) . '...' }} @endif</a></h3>
                                 <!-- <p class="game-meta">Action | Desktop</p> -->
                                 <p class="game-meta">{{ __('text.Release_date') }}:<span>{{ $product->created_at->format('M d Y') }}</span></p>
                                 <div class="game-action">
                                    <div class="game-price">
                                       <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                                    @if($product->sale_amount_excluding_tax != '0.00')
                                       @if(app()->getLocale() =='en')
                                          <p class="off">{{$product->getSalePrecentage()}} % OFF</p>
                                       @else
                                          <p class="off">{{$product->getSalePrecentage()}} % </p>
                                       @endif
                                    @endif
                                    </div>
                                    <div class="game-buy">
                                       @if($product->quantity > '0')
                                          <a href="javascript:void(0)" onclick="AddCart2('{{ $product->id }}','1')" class="fag-btn-outline">{{ __('text.add_to_cart') }}!</a>
                                       @else
                                          <a href="javascript:void(0)" onclick="PutId('{{ $product->id }}')" data-toggle="modal" data-target="#informmsg" class="fag-btn-outline">{{ __('text.cartnotenoughmsg') }}!</a>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end game item -->
                     @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Games Area End -->
       
       
      
       
      <!-- Promo Area Start -->
      <section class="fag-promo-area">
         <div class="promo-iamge">
            <img src="{{ asset('img/promo-bg.jpg') }}" alt="promo" />
         </div>
         <div class="promo-info">
            <div class="container">
               <div class="row">
                  <div class="col-md-7">
                     <div class="promo-box">
                        <h3>Realistic Battles</h3>
                        <p>Eleifend sem ipsum conubia euismod potenti ante ad sem sed, dictumst hymenaeos torquent quis. Class leo. Odio orci velit nulla habitasse conubia tempor eleifend dui suscipit mauris eget mollis</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Promo Area End -->
       
       
      <!-- Team Area Start -->
      <section class="fag-team-area section_100">
         <div class="top-layer"></div>
         <div class="bottom-layer"></div>
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">Team <span>Member</span></h2>
                     <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <div class="team-item">
                     <div class="team-image">
                        <img src="{{ asset('img/team-1.jpg') }}" alt="team-1">
                     </div>
                     <div class="team-details">
                        <h3>Kiam Jhon</h3>
                        <span>Game Developer</span>
                        <div class="team-social">
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-skype"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="team-item">
                     <div class="team-image">
                        <img src="{{ asset('img/team-2.jpg') }}" alt="team-2">
                     </div>
                     <div class="team-details">
                        <h3>Ican Ivanovich</h3>
                        <span>Game Developer</span>
                        <div class="team-social">
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-skype"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="team-item">
                     <div class="team-image">
                        <img src="{{ asset('img/team-3.jpg') }}" alt="team-3">
                     </div>
                     <div class="team-details">
                        <h3>Fizz Mark</h3>
                        <span>Game Developer</span>
                        <div class="team-social">
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-skype"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <div class="team-item">
                     <div class="team-image">
                        <img src="{{ asset('img/team-4.jpg') }}" alt="team-4">
                     </div>
                     <div class="team-details">
                        <h3>Vicky raj</h3>
                        <span>Game Developer</span>
                        <div class="team-social">
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-skype"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Team Area End -->
       
@endsection

