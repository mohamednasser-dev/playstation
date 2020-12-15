@php
  $labelLang='label_'.app()->getLocale();
  $nameLang='name_'.app()->getLocale();
@endphp
<div class="games-category">
                     <div class="row">
                  @foreach($products as $prod)
                        <div class="col-lg-4 col-sm-6">
                           <div class="games-single-item img-contain-isotope">
                              <div class="games-thumb">
                                    <a href="{{ url(app()->getLocale(),$prod->id).'/product-page' }}">
                                    <img src="{{$prod->ReturnLangPhoto()}}" alt="games" />
                                    </a>                                 
                              </div>
                              <div class="games-desc">
                                 <h3><a href="{{ url(app()->getLocale(),$prod->id).'/product-page' }}">{{$prod->$nameLang}}</a></h3>
                                 <p class="game-meta">{{ __('text.Release_date') }}:<span>{{ $prod->created_at->format('M d Y') }}</span></p>
                                 
                                 <div class="game-action">
                                    <div class="game-price">
                                       <h4>{{ __('text.'.$prod->currency()) }} {{$prod->ChangeCurrValue()}}</h4>
                                       @if($prod->sale_amount_excluding_tax != '0.00')
                                          @if(app()->getLocale() =='en')
                                             <p class="off">{{$prod->getSalePrecentage()}} % OFF</p>
                                          @else
                                             <p class="off">{{$product->getSalePrecentage()}} % </p>
                                          @endif
                                       @endif
                                    </div>
                                    <div class="game-buy">
                                    @if($prod->quantity > '0')
                                       <a href="javascript:void(0)" onclick="AddCart2('{{ $prod->id }}','1')"  class="fag-btn-outline">{{__('text.add_to_cart') }}</a>
                                    @else
                                          <a href="javascript:void(0)"  onclick="PutId('{{ $prod->id }}')" class="fag-btn-outline">{{ __('text.cartnotenoughmsg') }}</a>
                                    @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  @endforeach
                     </div>
                  </div>