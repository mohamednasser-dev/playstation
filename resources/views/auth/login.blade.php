@extends('layouts.app')
@section('content')
<!-- page 404 -->
<div class="page-404 section--full-bg">
 <div class="container">
    <div class="row">
       <div class="col-12">
          <div class="page-404__wrap">
             <div class="login-wrapper">
                <img class="login_user" src="{{ asset('img/login-avatar.png') }}" alt="login user" />
                <h3>{{ __('text.login') }}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('login',app()->getLocale())}}" method="post">
                        @csrf
                   <div class="form-row">
                      <input type="text" name="email" placeholder="{{ __('text.email') }}" required />
                   </div>
                   <div class="form-row">
                      <input type="password" name="password" placeholder="{{ __('text.password') }}" required />
                   </div>
                   <div class="form-row"></div>
                   <div class="form-row">
                      <button class="fag-btn" type="submit">{{ __('text.login') }}</button>
                   </div>
                </form>
                <!-- <div class="socials-wrapper">
                   <p>Login with your Social Account</p>
                   <ul>
                      <li><a href="#" class="facebook"><i class="fa fa-facebook-square"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#" class="twitch"><i class="fa fa-twitch"></i></a></li>
                      <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                   </ul>
                </div> -->
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!-- end page 404 -->
       
@endsection