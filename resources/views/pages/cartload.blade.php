<a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('text.cart') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
        @if(count(Cart::content()) > 0)
            <ul class="cart_product">

            @foreach(Cart::content() as $row)
                    @php
                        $product = App\Models\Product::find($row->id) 
                    @endphp
                <li>
                    <div class="media">
                        <a href="{{ route('product-page',['id' => $row->id,'language' => app()->getLocale() ]) }}">
                            <img alt="" class="mr-3" src="{{$product->ReturnLangPhoto()}}">
                        </a>
                        <div class="media-body">
                            <a href="{{ route('product-page',['id' => $row->id,'language' => app()->getLocale() ]) }}">
                                <h4>{{ $product->ProductNameLang(app()->getLocale()) }}</h4>
                            </a>
                            <h4>
                                <span>{{ $row->qty }} x {{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a href="#" onclick="DeleteCart('{{ $row->rowId }}')">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
            @endforeach
               
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>{{ __('text.subtotal') }} : <span>{{ __('text.KWD')}} {{ Cart::total() }}</span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="{{ url(app()->getLocale(),'cart') }}" class="btn btn-solid btn-block btn-solid-sm view-cart">{{ __('text.view_cart') }}</a>
                        <a href="{{ url(app()->getLocale(),'checkout') }}" class="btn btn-solid btn-solid-sm btn-block checkout">{{__('text.Checkout') }}</a>
                    </div>
                </li>
            </ul>
        @else
            <center><div style="font-size: 22px" >{{ __('text.CartMsg') }}</div></center>
        @endif
        </div>
    </div>