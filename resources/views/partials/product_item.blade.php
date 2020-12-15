@foreach($products as $product)
   <div class="games-item latest">
      <div class="games-single-item img-contain-isotope">
         <div class="games-thumb">
            <a href="{{ route('product-page',['id' => $product->id]) }}">
               <img src="{{ url($product->photo) }}" alt="games" />
            </a>
         </div>
         <div class="games-desc">
            <h3><a href="{{ route('product-page',['id' => $product->id]) }}">@if(strlen($product->ProductNameLang(session('locale')) ) <= 20){{ $product->ProductNameLang(session('locale')) }}@else {{ substr($product->ProductNameLang(session('locale')),0,20) . '...' }} @endif</a></h3>
            <!-- <p class="game-meta">Action | Desktop</p> -->
            <p class="game-meta">{{ __('text.Release_date') }}:<span>{{ $product->created_at->format('M d Y') }}</span></p>
            <div class="game-action">
               <div class="game-price">
                  <h4>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h4>
                  @if($product->sale_amount_excluding_tax != '0.00')
                     @if(session('locale') =='en')
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