<!-- Header Area Start -->
      <nav class="fag-header navbar navbar-expand-lg">
         &nbsp;&nbsp;&nbsp;&nbsp;
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="site logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="header_menu  mr-auto">
                <li  class="icon-cls"><a href="{{ url('/') }}"><i class="fa fa-home home-icon" aria-hidden="true"></i></a></li>
                  @php
                     $labelLang='label_'.session('locale');
                     @endphp
                        @foreach(App\Models\Category::where('parent',0)->where('status','1')->get() as $category)
                             @php 
                                $subs=$category->subcats($category->id,session('locale'));
                                    if( $subs->count()>0)
                                        {
                                                @endphp
                                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="{{ url($category->id).'/category-page' }}" role="button"  aria-expanded="false">{{$category->$labelLang}}</a>
                                                    <ul class="dropdown-menu">
                                                        @php
                                                            foreach($subs as $sub)
                                                            {
                                                        @endphp
                                                                <li><a href="{{ url($sub->id).'/category-page' }}">{{$sub->$labelLang}}</a></li>
                                                        @php
                                                            }
                                                        @endphp

                                                    </ul>
                                                @php
                                            }
                                            else{
                                                @endphp
                                                    <li class="nav-item"><a href="{{ url($category->id).'/category-page' }}" class="nav-link">{{$category->$labelLang}}</a>
                                                @php
                                        }
                                    @endphp
                            </li>
                        @endforeach
               </ul>
               <div class="header-right  my-2 my-lg-0">
                  <div class="header-search">
                     <a href="#" id="search-trigger"><i class="fa fa-search"></i></a>
                  </div>
                  <!-- Search Block -->
                  <div class="search-block">
                     <a href="#" class="search-toggle">
                     <i class="fa fa-times"></i>
                     </a>
                     <form action="{{ route('searchnames',session('locale')) }}" method="get">
                        @csrf
                        <input type="text" name="search_input" id="search_input" placeholder="{{ __('text.looking') }}" required value="{{ $searchcrtiria ?? '' }}">
                        <div class="dropdown-content1" id="show-list"  >
                                <a href="" ></a>
                            </div>
                        <button type="submit"><i class="fa fa-search"></i></button>
                     </form>
                  </div>
                  <!-- /Search Block -->
                  <div class="header-cart" >
                     <a href="{{ url('cart') }}">
                     <img src="{{ asset('img/shopping-cart.png') }}" alt="shopping cart" />
                     <div id="cartcount">
                    @php
                        $i = 0 ;
                    @endphp
                    @foreach(Cart::content() as $row)
                          @php
                              $product = App\Models\Product::find($row->id)
                          @endphp
                        @if($product)
                          @php
                              $i += $product->ChangeCurrValue()*$row->qty ;
                          @endphp
                        @endif
                    @endforeach

                      {{ number_format($i,2) }} </div>
                     </a>
                  </div>

                  &nbsp;&nbsp;
                  <div class="header-lang nav-item dropdown">
                    @if(session('locale') == 'en')
                          <a class="lang-btn nav-link dropdown-toggle" href="{{ url('/')}}" role="button" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/uk.png') }}" alt="UK">
                       EN</a>
                    
                       <ul class="lang-menu dropdown-menu">
                          <li><a href="{{ url('switchlang/ar') }}"><img src="{{ asset('img/ar.png') }}" alt="AR"><span>AR</span></a></li>
                       </ul>
                    @else
                       <a class="lang-btn nav-link dropdown-toggle" href="{{ url('/')}}" role="button" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/ar.png') }}" alt="AR">
                       عربى</a>
                    
                       <ul class="lang-menu dropdown-menu">
                          <li><a href="{{ url('switchlang/en') }}"><img src="{{ asset('img/uk.png') }}" alt="UK"><span>EN</span></a></li>
                       </ul>
                    @endif
                  </div>
                  &nbsp;&nbsp;
          <div class="header-lang nav-item dropdown">
             <a class="lang-btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">@if(!empty(Session::get('country-curr')))@if(Session::get('country-curr') == 'KWD')<img src="{{ asset('img/ar.png') }}" alt="AR">  @elseif(Session::get('country-curr') == 'EGP')<img src="{{ asset('img/eg.png') }}" alt="AR"> @elseif(Session::get('country-curr') == 'CAD')<img src="{{ asset('img/Canada.png') }}" alt="AR"> @elseif(Session::get('country-curr') == 'USD') <img src="{{ asset('img/us.png') }}" alt="AR"> @endif @else <img src="{{ asset('img/ar.png') }}" alt="AR"> @endif
                     @if(!empty(Session::get('country-curr')))  {{ Session::get('country-curr') }} @else KWD @endif</a>
                  
                     <ul class="lang-menu dropdown-menu">
              @foreach(\App\Models\Country::whereIn('id',['115','230','38','63'])->get() as $country)

                      @if(!empty(Session::get('country-curr')))
                       @if( $country->currency_code != Session::get('country-curr')) 
                        <li><a href="{{ route('setcookie',['cur' => $country->currency_code ,'language' =>session('locale')  ]) }}"> @if($country->currency_code == 'KWD')<img src="{{ asset('img/ar.png') }}" alt="AR">  @elseif($country->currency_code == 'EGP')<img src="{{ asset('img/eg.png') }}" alt="AR"> @elseif($country->currency_code == 'CAD')<img src="{{ asset('img/Canada.png') }}" alt="AR"> @elseif($country->currency_code == 'USD') <img src="{{ asset('img/us.png') }}" alt="AR"> @endif<span>{{ $country->currency_code }}</span></a></li>
                        @endif
                      @else
                      @if( $country->currency_code != 'KWD') 
                        <li><a href="{{ route('setcookie',['cur' => $country->currency_code ,'language' =>session('locale')  ]) }}"> @if($country->currency_code == 'KWD')<img src="{{ asset('img/ar.png') }}" alt="AR">  @elseif($country->currency_code == 'EGP')<img src="{{ asset('img/eg.png') }}" alt="AR"> @elseif($country->currency_code == 'CAD')<img src="{{ asset('img/Canada.png') }}" alt="AR"> @elseif($country->currency_code == 'USD') <img src="{{ asset('img/us.png') }}" alt="AR"> @endif<span>{{ $country->currency_code }}</span></a></li>
                        @endif
                        @endif
              @endforeach
                     </ul>
          </div>

                  &nbsp;&nbsp;

                  @auth
                     <div class="header-auth  nav-item dropdown">
                        <a class="lang-btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}</a>
                        <ul class="user_menu dropdown-menu">
                           <li><a href="{{ url(session('locale'),'profile') }}">{{ __('text.Profile') }}</a></li>
                           <li><a href="{{ url(session('locale'),'order-history') }}">{{ __('text.My_Orders') }}</a></li>
                           <li><a href="{{ url(session('locale'),'address-book') }}">{{ __('text.Address_Book') }}</a></li>
                           <li><a href="{{ url(session('locale'),'change_password') }}">{{ __('text.Change_Password') }}</a></li>
                           <li><a  href="{{ route('logout',session('locale')) }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('text.LogOut') }}</a> <form id="logout-form" action="{{ route('logout',session('locale')) }}" method="POST" style="display: none;">
                                        @csrf</form></li>
                        </ul>
                     </div>
                  @else
                     <div class="header-lang nav-item dropdown">
                        <a class="lang-btn nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">{{ __('text.Account') }}
                        </a>
                        <ul class="lang-menu dropdown-menu">
                          <li><a href="{{ route('login',session('locale'))}}">{{ __('text.login') }}</a></li>
                           <li><a href="{{ route('register',session('locale'))}}">{{ __('text.Regitser') }}</a></li>
                        </ul>
                     </div>
                  @endauth
               </div>
            </div>
          &nbsp;&nbsp;&nbsp;&nbsp;
      </nav>
      <!-- Header Area End -->