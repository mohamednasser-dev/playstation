@extends('layouts.app')
@section('content')

     <!-- Breadcrumb Area Start -->
      <section class="fag-breadcrumb-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="games-details-banner">
                     <div class="row">
                        <div class="col-lg-3 col-sm-4">
                           <div class="details-banner-thumb">
                              <img src="{{$product->ReturnLangPhoto()}}" alt="games">
                           </div>
                        </div>
                        <div class="col-lg-6 col-sm-8">
                           <div class="details-banner-info">
                              <h3>{{ $product->ProductNameLang(app()->getLocale()) }} </h3>
                              <div class="single_game_meta">
                                 <!-- <p class="details-genre">Action | Desktop</p> -->
                                 <p class="details-time-left"><i class="fa fa-calendar"></i>{{ __('text.Release_date') }}: <span>{{ $product->created_at->format('M d Y') }}</span></p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="game-price single_game_price">
                              @if($product->sale_amount_excluding_tax != '0.00') 
                                 @if(app()->getLocale() =='en')
                                     <h4><p class="off"><del>{{ __('text.'.$product->currency()) }} {{$product->getSaleAmount()}}</del>&nbsp;<span></span>{{$product->getSalePrecentage()}} % OFF</p></h4>
                                 @else
                                     <h4><p class="off"><del>{{ __('text.'.$product->currency()) }} {{$product->getSaleAmount()}}</del>&nbsp;<span></span>{{$product->getSalePrecentage()}} %  </p></h4>
                                 @endif
                                 <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                              @else
                                 <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                              @endif
                              <!-- <p class="off"><del>$56.99</del><span></span>50% OFF</p> -->
                           </div>
                           <div class="details-banner-action">
                              @if($product->quantity > '0')
                                 <a href="#" onclick="AddCart2('{{ $product->id }}','1')" class="fag-btn">{{ __('text.add_to_cart') }}!</a>
                              @else
                                 <a href="#" onclick="PutId('{{ $product->id }}')" class="fag-btn">{{ __('text.cartnotenoughmsg') }}!</a>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
       
      <!-- games Details Page Start -->
      <section class="fag-games-details-page section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-9 offset-lg-3">
                  <div class="games-details-page-box">
                     <ul>
                        <li><b>{{__('text.brand')}} :</b> <span>{{ $product->brand()->name}}</span></li>
                        <li><b>{{__('text.product_code')}} :</b> <span>{{ $product->product_code}}</span> </li>
                     </ul>
                     <div class="tv-panel-list">
                        <div class="tv-tab">
                           <ul class="nav nav-pills tv-tab-switch" id="pills-tab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active show" id="pills-brief-tab" data-toggle="pill" href="#pills-brief" role="tab" aria-controls="pills-brief" aria-selected="true">{{ __('text.Description') }}</a>
                              </li>
                             <!--  <li class="nav-item">
                                 <a class="nav-link" id="pills-cast-tab" data-toggle="pill" href="#pills-cast" role="tab" aria-controls="pills-cast" aria-selected="false">Features</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">reviews</a>
                              </li> -->
                           </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                           <div class="tab-pane fade active show" id="pills-brief" role="tabpanel" aria-labelledby="pills-brief-tab">
                              <div class="tab-gamess-details">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab-body">
                                          <p>{{ $product->ProductdescriptionLang(app()->getLocale()) }}</p>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Row -->
                              </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- games Details Page End -->
       
       
      <!-- Related Games Start -->
      <section class="fag-games-area related_games section_100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">{{ __('text.related_products') }}</span></h2>
                  </div>
               </div>
            </div>
            <div class="row">
            @foreach($related_products as $product)
               <div class="col-lg-3 col-sm-6">
                  <div class="games-single-item img-contain-isotope">
                     <div class="games-thumb">
                           <a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">
                           <img src="{{ $product->ReturnLangPhoto() }}" alt="games" />
                           </a>
                     </div>
                     <div class="games-desc">
                        <h3><a href="{{ route('product-page',['id' => $product->id,'language' => app()->getLocale() ]) }}">{{ $product->ProductNameLang(app()->getLocale()) }}</a></h3>
<!--                         <p class="game-meta">Action | Desktop</p>
 -->                        <p class="game-meta">{{ __('text.Release_date') }}:<span> {{ $product->created_at->format('M d Y') }}</span></p>
                        
                        <div class="game-action">
                           <div class="game-price">
                              <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                              @if($product->sale_amount_excluding_tax != '0.00') 
                                 @if(app()->getLocale() =='en')
                                     <h4><p class="off"><del>{{ __('text.'.$product->currency()) }} {{$product->getSaleAmount()}}</del>&nbsp;<span></span>{{$product->getSalePrecentage()}} % OFF</p></h4>
                                 @else
                                     <h4><p class="off"><del>{{ __('text.'.$product->currency()) }} {{$product->getSaleAmount()}}</del>&nbsp;<span></span>{{$product->getSalePrecentage()}} %  </p></h4>
                                 @endif
                              @endif
                           </div>
                           <div class="game-buy">
                              <a href="javascript:void(0)" onclick="AddCart2('{{ $product->id }}','1')" class="fag-btn-outline">{{__('text.add_to_cart') }}</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
               </div>
            </div>
         </div>
      </section>
      <!-- Related Games End -->
@endsection

