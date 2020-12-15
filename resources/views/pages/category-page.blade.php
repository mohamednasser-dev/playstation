@extends('layouts.app')
@section('content')
@php
  $labelLang='label_'.session('locale');
  $nameLang='name_'.session('locale');
@endphp
<!-- Breadcrumb Area Start -->
      <section class="fag-breadcrumb-area" style="background-image: url('{{$cat->getPhoto()}}') ;background-repeat: no-repeat;background-size: cover; background-position: top center;">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="breadcromb-box">
                     <h3>{{ __('text.Our_games') }}</span></h3>
                     <ul>
                    <li><i class="fa fa-home"></i></li>
                    <li><a href="{{ url('/') }}">{{ __('text.Home') }}</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{ __('text.Our_games') }}</li>
                </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
       
      <!-- Game Page Start -->
      <section class="fag-game-page section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  <div class="sidebar-widget">
                     <div class="filter">
                        <h4 class="filter_title">{{ __('text.Filters') }} </h4>
                      
                        <div class="filter_group">
                           <label for="sort" class="filter_label">{{ __('text.Sort_by') }}:</label>
                           <div class="filter_select-wrap">
                              <select name="latest" id="sorting" class="filter_select" >
                                 <option value="0">{{ __('text.Latest') }}</option>
                                 <option value="1">50 {{__('text.PRODUCT')}}</option>
                                 <option value="2">100 {{__('text.PRODUCT')}}</option>
                              </select>
                           </div>
                        </div>
                        <div class="filter_group">
                           <label class="filter_label">{{ __('text.Sorting_Price') }}:</label>
                              <select name="price" id="sorting" class="filter_select">
                                 <option value="0">{{ __('text.Sorting_Price') }}</option>
                                 <option value="1">{{ __('text.High_to_low') }}</option>
                                 <option value="2">{{ __('text.low_to_High') }}</option>
                              </select>
                        </div>
                        <div class="filter_group">
                           <label class="filter_label">{{ __('text.Sorting_Name') }}:</label>
                              <select name="name" id="sorting" class="filter_select">
                                 <option value="0">{{ __('text.Sorting_Name') }}</option>
                                 <option value="1">{{ __('text.A_Z') }}</option>
                                 <option value="2">{{ __('text.Z_A') }}</option>
                              </select>
                        </div>
                        <!-- <div class="filter_group">
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
                        </div> -->
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <img src="{{asset('img/giphy.gif')}}" width="50px" height="50px" style="display:none;margin: 50px 20px 10px 300px;" id="loading" />
                  <div class="games-category">
                     <div class="row">
                  @foreach($products as $prod)
                        <div class="col-lg-4 col-sm-6">
                           <div class="games-single-item img-contain-isotope">
                              <div class="games-thumb">
                                    <a href="{{ url($prod->id).'/product-page' }}">
                                    <img src="{{$prod->ReturnLangPhoto()}}" alt="nasser" />
                                    </a>                                 
                              </div>
                              <div class="games-desc">
                                 <h3><a href="{{ url($prod->id).'/product-page' }}">{{$prod->$nameLang}}</a></h3>
                                 <p class="game-meta">{{ __('text.Release_date') }}:<span>{{ $prod->created_at->format('M d Y') }}</span></p>
                                 
                                 <div class="game-action">
                                    <div class="game-price">
                                       <h4>{{ __('text.'.$prod->currency()) }} {{$prod->ChangeCurrValue()}}</h4>
                                       @if($prod->sale_amount_excluding_tax != '0.00')
                                          @if(session('locale') =='en')
                                             <p class="off">{{$prod->getSalePrecentage()}} % OFF</p>
                                          @else
                                             <p class="off">{{$prod->getSalePrecentage()}} % </p>
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
                     {{ $products->links() }}
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Game Page End -->
       
       
@endsection