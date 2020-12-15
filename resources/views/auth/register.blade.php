@extends('layouts.app')

@section('content')
<!-- page 404 -->
      <div class="page-404 section--full-bg">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="page-404__wrap">
                     <div class="login-wrapper">
                        <h3>{{ __('text.create_Account') }}</h3>
                        @if ($errors->any())
                             <div class="alert alert-danger">
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
                        <form method="POST" action="{{ route('register',app()->getLocale()) }}">
                           @csrf
                           <div class="form-row">
                              <input type="text" name="fullname" placeholder="{{ __('text.fullname') }}" required value="{{ old('fullname') }}" />

                              @error('fullname')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="form-row">
                              <input type="email" name="email" placeholder="{{ __('text.email') }}" required value="{{ old('email') }}" />
                              @error('email')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="form-row">
                              <input type="password" name="password"  placeholder="{{ __('text.password') }}" required />
                              @error('password')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="form-row">
                              <input type="password" name="password_confirmation"   placeholder="{{ __('text.passwordconfirmation') }}" required />
                              @error('password_confirmation')
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="form-row">
                              <select class="form-control" size="1" name="country">
                                  @foreach(\App\Models\Country::whereIn('id',['115','230','38','63'])->get() as $country)
                                      <option value="{{ $country->id }}" @if($country->id == '115') selected @endif >@if(app()->getLocale() == 'en'){{ $country->name }}@else{{ $country->name_ar }}@endif</option>
                                  @endforeach
                              </select>
                           </div>
                           <div class="form-row">
                              <button class="fag-btn" type="submit">{{ __('text.create_Account') }}</button>
                           </div>
                        </form>
                        <!-- <div class="socials-wrapper">
                           <p>Signup with your Social Account</p>
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






