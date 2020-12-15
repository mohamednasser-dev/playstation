
@extends('layouts.app')
@section('content')
<!-- breadcrumb start -->
<section class="breadcrumb-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title">
                    <h2>Payment Failed</h2>
                </div>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">{{ __('text.Home') }}</a></li>
                      
                    </ol>
                </nav>
				<div>  Reason: {{$message}}</div>
            </div>
        </div>
    </div>
</section>


@endsection