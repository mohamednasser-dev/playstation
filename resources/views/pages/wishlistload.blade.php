<a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('text.My_Wishlist') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
            @auth
                @foreach(\App\Models\Favourite::where('customer_id',auth()->user()->id)->get() as $wishlist)
                    @php
                        $product = App\Models\Product::find($wishlist->product_id) 
                    @endphp
                    <li>
                        <div class="media">
                            <a href="#">
                                <img alt="" class="mr-3" src="{{ $product->ReturnLangPhoto() }}">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $product->ProductNameLang(app()->getLocale()) }}</h4>
                                </a>
                                
                                <h4>
                                    <span>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</span>
                                </h4>
                            </div>
                        </div>
                        <div class="close-circle">
                            <a href="#" onclick="DeleteWishlist('{{ $wishlist->id }}')">
                                <i class="ti-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            @endauth
            </ul>
             <ul class="cart_total">
                <!--<li>
                    <div class="total">
                        <h5>subtotal : <span>KWD 299.00</span></h5>
                    </div>
                </li>-->
                <li>
                    <div class="buttons">
                        <a href="{{ url(app()->getLocale(),'My_Wishlist') }}" class="btn btn-solid btn-block btn-solid-sm view-cart">view wislist</a>
                    </div>
                </li>
            </ul> 
        </div>
    </div>