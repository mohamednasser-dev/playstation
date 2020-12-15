@extends('layouts.app')
@section('content')
<input type="hidden" name="success_msg" id="success_msg" value="{{ __('text.success_msg') }}"> 
<input type="hidden" name="congratulation" id="congratulation" value="{{ __('text.congratulation') }}">
<input type="hidden" name="max_count" id="max_count" value="{{ __('text.max_count') }}"> 
<input type="hidden" name="items" id="items" value="{{ __('text.items') }}">
<style type="text/css">
    div.gallery:hover {
  border: 5px solid green;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  height: 500px;
  border: 1px solid #888;
  width: 80%;
}
</style>
<section class="section-b-space tab-layout1 ratio_square" id ="step1">

    <div class="container" style="text-align: center;">
      <a href="#" > <button id ="backBtn"style="position: relative;left:-50px;"> <img src="{{ asset('images/backIcon.png') }}" style="width: 20px;height: 20px;">{{ __('text.Back') }}</button></a>
        <a href=""><img src="{{ asset('images/1S1.png') }}" style="width: 26px;height: 25px;padding: opx;margin: opx;"></a>
        <hr style="position: relative;top:13px;left: -5px;height:3px;border-width:0;width:300px;display:inline-flex;color:gray;background-color:gray">
        <a href=""><img src="{{ asset('images/2S.png' ) }}" style="width: 22px;height: 22pxs;position: relative;left: -7px;"></a>
        <hr style="position: relative;top:13px;left: -11px;height:3px;border-width:0;width:300px;display:inline-flex;color:gray;background-color:gray">
        <a href=""><img src="{{ asset('images/3S.png') }}" style="width: 22px;height: 22px;position: relative;left: -17px;"></a>
        <img src="{{ asset('images/nextIcon.png') }}" style="width: 20px;height: 20px;"><label>{{ __('text.choose_box') }}</label>
    </div>
    <hr>
    <div class="container">
        <div class="theme-tab">
        <div class="drop-shadow">
            <div class="left-shadow">
                <img src="{{asset('images/left.png') }}" alt="" class=" img-fluid">
            </div>
            <div class="right-shadow">
                <img src="{{asset('images/right.png') }}" alt="" class=" img-fluid">
            </div>
        </div>
        
        <div class="tab-content-cls">

        @foreach($countArrs as $vae)
            <div id="tab-{{ $vae}}" @if($vae == '1') class="tab-content active default" @else class="tab-content" @endif >
                <div class="container">
                    <div class="row border-row1">
                        @foreach($boxex[$vae] as $val)
                        <div class="col-lg-2 col-sm-4 col-6 p-0"  onclick="ChooseFirstOne('{{ $val->id }}','{{ $val->count }}');">
                            <div class="gallery">
                                <div class="product-box">
                                    <div class="img-block">
                                        <a href="#"><img src="{{ $val->ReturnLangPhoto() }}" class=" img-fluid bg-img" alt=""></a>
                                    </div>
                                    <input type="hidden" name="box_id" id="box_id" value="{{ $val->id }}">
                                    <div class="product-info">
                                        <h5>{{ $val->BoxeNameLang(app()->getLocale())}} :  {{ $val->ChangeCurrValue() }} {{ __('text.'.$val->currency() ) }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
          
            </div>
        @endforeach
    <div class="clearfix"></div>          
        
    </div>
        <ul class="tabs" style="text-align: center;">
        @foreach($countArrs as $vae)
            <li @if($vae =='1')class="current" @endif >
                <a href="tab-{{$vae}}" id="bt{{$vae}}" @if($vae != '1') style="padding-left: 10px;padding-right: 15px;background-color: white;border:2px solid #f1e1e1;border-radius:2px;color: black" @else style="padding-left: 10px;padding-right: 15px;background-color: rgb(172, 139, 139);border:2px solid #f1e1e1;border-radius:2px;color: black" @endif>{{$vae}}</a>
            </li>
        @endforeach
            <label style="color: #58413a; font-family: Arial, Helvetica, sans-serif;font-size:larger">{{ __('text.gift_no') }}</label>
        </ul>
</div>
    <!---2nd Step-->
</section>
<section class="breadcrumb-section section-b-space" id="step2" style="display: none;">
    <div class="container" style="text-align: center;">
        <a href="#" onclick='document.getElementById("step1").style.display="block";document.getElementById("step2").style.display="none"' onclick> <button id ="backBtn"style="position: relative;left:-50px;"> <img src="{{ asset('images/backIcon.png') }}" style="width: 20px;height: 20px;">{{ __('text.Back') }}</button></a>
        <a onclick='document.getElementById("step1").style.display="block";document.getElementById("step2").style.display="none"' href=""><img src="{{ asset('images/1S1.png') }}" style="width: 26px;height: 25px;padding: opx;margin: 0px;"></a>
        <hr style="position: relative;top:13px;left: -5px;height:3px;border-width:0;width:300px;display:inline-flex;color:gray;background-color:gray">
        <a href="#"><img src="{{ asset('images/2S2.png') }}" style="width: 22px;height: 22pxs;position: relative;left: -7px;"></a>
        <hr style="position: relative;top:13px;left: -11px;height:3px;border-width:0;width:300px;display:inline-flex;color:gray;background-color:gray">
        <a href="#"><img src="{{ asset('images/3S.png') }}" style="width: 22px;height: 22px;position: relative;left: -17px;"></a>
        <label>{{ __('text.choose_box') }}</label><img src="{{ asset('images/nextIcon.png') }}" style="width: 20px;height: 20px;">   

            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" id="close">&times;</span>
                    <div style="text-align: left;">
                        <img id="modalphoto" width="600" height="400" >
                    </div>
                        <div style="text-align:right;position: relative;top:-400px">
                            <h1 style="display: block;">{{__('text.card_content') }}</h1>
                        </div> 
                        <div style="text-align:right;position: relative;top:-380px;">
                            <textarea style="width: 300px;height: 200px;" id="card_content" >
                            </textarea>
                        </div>
                    <button id ="myBtn1" onclick="ChooseContent();" style="padding-left: 20px;padding-right: 45px;background-color: rgb(172, 139, 139);border:3px solid #f1e1e1;border-radius:2px;width: 40px;position: relative;top: -300px;left:10px">{{__('text.next')}}</button>
                </div>
            </div>
    </div>
    <hr>
    <div class="container">
        <div class="tab-content-cls">
                <div class="container">
                    <div class="row border-row1">
        @foreach($boxes_card as $card)
            <div class="col-lg-2 col-sm-4 col-6 p-0" id ="card-{{$card->id}}" onclick="ChooseCard('{{$card->id}}','{{$card->ReturnLangPhoto()}}')">
                <div class="gallery">
                    <div class="product-box">
                        <div class="img-block">
                            <a href="#"><img src="{{ $card->ReturnLangPhoto() }}" alt="Cinque Terre" width="600" height="400"></a>
                        </div>
                        <input type="hidden" name="box_id" id="box_id" value="{{ $val->id }}">
                        <div class="product-info">
                            <h5>{{ $card->CardNameLang(app()->getLocale())}} :  {{ $card->ChangeCurrValue() }} {{ __('text.'.$card->currency() ) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach  
        </div>
        </div>
        </div>
        </div> 
    </div>
                  
    </div>
</section>

<section  id="step3" style="display: none; ">

    <div class="contStep3" style="text-align: center;">
        <a onclick='document.getElementById("step2").style.display="block";document.getElementById("step3").style.display="none"' href="#" onclick> <button id ="backBtn"style="position: relative;left:-50px;"> <img src="{{ asset('images/backIcon.png') }}" style="width: 20px;height: 20px;">{{ __('text.Back') }}</button></a>
        <a onclick='document.getElementById("step1").style.display="block";document.getElementById("step3").style.display="none"' href=""><img src="{{ asset('images/1S1.png') }}" style="width: 26px;height: 25px;padding: opx;margin: 0px;"></a>
        <hr style="position: relative;top:13px;left: -5px;height:3px;border-width:0;width:300px;display:inline-flex;color:gray;background-color:gray">
        <a href="" onclick='document.getElementById("step2").style.display="block";document.getElementById("step3").style.display="none"'><img src="{{ asset('images/2S2.png') }}" style="width: 22px;height: 22pxs;position: relative;left: -7px;"></a>
        <hr style="position: relative;top:13px;left: -11px;height:3px;border-width:0;width:300px;display:inline-flex;color:gray;background-color:gray">
        <a  href="#"><img src="{{ asset('images/3S3.png') }}" style="width: 22px;height: 22px;position: relative;left: -17px;"></a>
        <label>{{ __('text.choose_box') }}</label><img src="{{ asset('images/nextIcon.png') }}" style="width: 20px;height: 20px;">
        
    </div>

    <div class="contStep3" style="text-align: center;">

        <h1>Select your Product</h1>
        <!-- tab section start -->
        <button id ="myBtn1" style="padding-left: 20px;padding-right: 45px;background-color: rgb(172, 139, 139);border:3px solid #f1e1e1;border-radius:2px;width: 40px;" onclick="FinishProcess()">{{__('text.finish')}}</button>

<section class="section-b-space tab-layout1 ratio_square">
    <div class="theme-tab">
        
    
        <div class="tab-content-cls">
            <div id="tab-1" class="tab-content active default" >
                <div class="container">
                    <div class="row border-row1">
                    @foreach($products as $product)
                        <div class="col-lg-2 col-sm-4 col-6 p-0" >
                            <div class="product-box" id="product-{{ $product->id }}">
                                <div class="img-block">
                                    <a href="#"  onclick="checkcount('{{ $product->id }}')"><img src="{{$product->ReturnLangPhoto()}}" class=" img-fluid bg-img" alt=""></a>

                                    
                                </div>
                                <div class="product-info">
                                    <a href="#" onclick="checkcount('{{ $product->id }}')"><h6>{{ $product->ProductNameLang(app()->getLocale()) }}</h6></a>
                                    <h5>{{ __('text.'.$product->currency()) }} {{$product->ChangeCurrValue()}}</h5>
                                </div>
                                <div class="addtocart_box">
                                    <div class="addtocart_detail">
                                        <div>

                                            <div class="addtocart_btn">
                                                <a href="javascript:void(0)"  onclick="AddCart('{{ $product->id }}')" data-toggle="modal" class="closeCartbox" data-target="#addtocart" tabindex="0">{{ __('text.add_to_cart') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-cart">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</section>
<!-- tab section start -->
    </div>

</section>


@endsection

<script type="text/javascript">
    var PArr = [] ;
    function ChooseFirstOne(id,boxcount){
        document.getElementById("step1").style.display="none";
        document.getElementById("step2").style.display="block" ;
        sessionStorage['box_id'] = id ;
        sessionStorage['box_count'] = boxcount ;
        sessionStorage['product_count'] = 0 ;
    }

    function ChooseCard(id,path){
        document.getElementById("step1").style.display="none";
        document.getElementById("step2").style.display="block" ;
        sessionStorage['card_id'] = id ;
        document.getElementById("myModal").style.display = "block";
        document.getElementById("modalphoto").src = path;
    }

    function ChooseContent(){
        var content = document.getElementById('card_content').value ;
        if(content.length < 1){
            alert('please write something on the card ') ;
            document.getElementById('card_content').focus() ;
            return false;
        }
        document.getElementById("step1").style.display="none";
        document.getElementById("step2").style.display="none" ;
        document.getElementById("step3").style.display="block" ;
        sessionStorage['content'] = content ;
    }

    function checkcount(id){
        var prod = "product-"+id ;
        const index = PArr.indexOf(id);
        if( document.getElementById(prod).style.backgroundColor  == 'green'){
            document.getElementById(prod).style.backgroundColor  = 'white' ;
            PArr.splice(index,1) ;
            --sessionStorage['product_count']
        }else{
            if(sessionStorage['product_count'] >= sessionStorage['box_count'] ){
                alert(document.getElementById('max_count').value+' '+sessionStorage['box_count']+document.getElementById('items').value) ;
                return false ;
            }else{
                sessionStorage['product_count'] = ++sessionStorage['product_count'] ;
                document.getElementById(prod).style.backgroundColor  = 'green' ;
                PArr.push(id) ;
            }
        }
        
    }

    function FinishProcess(){
        var box_id = sessionStorage['box_id'] ;
        var card_id = sessionStorage['card_id'] ;
        var card_msg = sessionStorage['content'] ;
        var products = PArr ;
        let _token   = $('meta[name="csrf-token"]').attr('content'); congratulation
        var success_msg = document.getElementById('success_msg').value ;
        var congratulation = document.getElementById('congratulation').value ;
        $.ajax({
                url: "/" + $('html').attr('lang') + "/add-gift",
                type:"POST",
                data:{
                  products:products,
                  msg:card_msg,
                  card_id:card_id,
                  box_id:box_id,
                  _token: _token
                },
                datatype: 'html',
                success:function(data){
                    swal({
                        title:congratulation,
                        text:success_msg,
                        buttons:{
                          cancel: false,
                          confirm: true
                        }
                      } ,function(isConfirm){

                        if (isConfirm){
                            location.href = "/" + $('html').attr('lang') ;
                        }
                      }) ;
                }, 
        });
    }
</script>