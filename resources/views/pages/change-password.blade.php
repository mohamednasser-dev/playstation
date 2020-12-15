@extends('layouts.app')

@section('content')

<section class="fag-breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcromb-box">
                    <h3>{{ __('text.dashboard') }}</h3>
                    <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li ><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li  aria-current="page">{{ __('text.Change_Password') }}</li>
                    </ul>
                </div>
        </div>
    </div>
</section>
<!-- breadcrumb End -->

<!-- section start -->
<section class="fag-game-page section_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-right">
                        
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="theme-card">
                            <form class="theme-form" action="{{route('change-password',app()->getLocale()) }}" method="post">
                                @csrf
                                <div class="form-row">
                                <div class="col-md-12">
                                    <label for="review">{{ __('text.old_password') }}</label>
                                        <input type="password" class="form-control" name="old_password"  placeholder="{{ __('text.Enter_Your') }} {{ __('text.old_password') }}" required="{{ __('text.old_password') }}"  >
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="review">{{ __('text.password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('text.Enter_Your') }} {{ __('text.password') }}" required="{{ __('text.password') }}" >

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">{{ __('text.passwordconfirmation') }}</label>
                                       <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('text.Enter_Your') }} {{ __('text.passwordconfirmation')}}" required="{{ __('text.passwordconfirmation')}}"  >
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-solid">{{ __('text.save') }}</button>
                                    
                            </form>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection