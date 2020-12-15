@extends('layouts.app')

@section('content')

<section class="breadcrumb-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2>{{ __('text.forget_password') }}</h2>
                </div>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('text.forget_password') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="pwd-page section-b-space ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 ">
                <h2>{{ __('text.Forget_Your_Password') }}</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email',app()->getLocale()) }}">
                        @csrf
                        {{ method_field('POST') }}
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email"  placeholder="{{ __('text.Enter_Your')}} {{ __('text.email')}}" required="" value="{{ old('email') }}">
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-solid">{{ __('text.Submit') }}</button></div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
