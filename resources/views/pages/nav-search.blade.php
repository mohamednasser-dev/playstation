@extends('layouts.app')
@section('content')
@php
  $labelLang='label_'.app()->getLocale();
  $nameLang='name_'.app()->getLocale();
@endphp


<section class="fag-game-page section_100">
    @if(count($products) > 0)
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  <div class="sidebar-widget">
                     <div class="filter">
                        <h4 class="filter_title">Filters <button type="button">Clear all</button></h4>
                        <div class="filter_group">
                           <label class="filter_label">Keyword:</label>
                           <input type="text" class="filter_input" placeholder="Keyword">
                        </div>
                        <div class="filter_group">
                           <label for="sort" class="filter_label">Sort by:</label>
                           <div class="filter_select-wrap">
                              <select name="sort" id="sort" class="filter_select">
                                 <option value="0">Relevance</option>
                                 <option value="1">Newest</option>
                                 <option value="2">Oldest</option>
                              </select>
                           </div>
                        </div>
                        <div class="filter_group">
                           <label class="filter_label">Price:</label>
                           <div class="filter_range">
                              <div id="filter_range-start"></div>
                              <div id="filter_range-end"></div>
                           </div>
                           <div id="filter_range"></div>
                        </div>
                        <div class="filter_group">
                           <label class="filter_label">Platforms:</label>
                           <ul class="filter_checkboxes">
                              <li class="custom-checkbox">
                                 <input id="type1" type="checkbox" name="type1">
                                 <label for="type1">Playstation</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type2" type="checkbox" name="type2">
                                 <label for="type2">XBOX</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type3" type="checkbox" name="type3">
                                 <label for="type3">Windows</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type4" type="checkbox" name="type4">
                                 <label for="type4">Mac OS</label>
                                 <span class="checkbox"></span>
                              </li>
                           </ul>
                        </div>
                        <div class="filter_group">
                           <label class="filter_label">Genres:</label>
                           <ul class="filter_checkboxes">
                              <li class="custom-checkbox">
                                 <input id="type5" type="checkbox" name="type5">
                                 <label for="type5">Action</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type6" type="checkbox" name="type6">
                                 <label for="type6">Adventure</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type7" type="checkbox" name="type7">
                                 <label for="type7">Fighting</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type8" type="checkbox" name="type8">
                                 <label for="type8">Flight simulation</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type9" type="checkbox" name="type9">
                                 <label for="type9">Platform</label>
                                 <span class="checkbox"></span>
                              </li>
                              <li class="custom-checkbox">
                                 <input id="type10" type="checkbox" name="type10">
                                 <label for="type10">Racing</label>
                                 <span class="checkbox"></span>
                              </li>
                           </ul>
                        </div>
                        <div class="filter_group">
                           <button class="fag-btn" type="button">APPLY FILTER</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <img src="{{asset('images/giphy.gif')}}" width="50px" height="50px" style="display:none;margin: 50px 20px 10px 300px;" id="loading" />
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
                  <div class="pagination-box-row">
                     <p>Page 1 of 6</p>
                     <ul class="pagination">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li>...</li>
                        <li><a href="#">6</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
@else
    <center><h4 style="text-align: center;">{{ __('text.searchemptyresult') }}</h4></center>
@endif
</section>
<!-- section End -->

@endsection