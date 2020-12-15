@extends('layouts.app')
@section('content')
 <!-- Breadcrumb Area Start -->
  <section class="fag-breadcrumb-area">
     <div class="container">
        <div class="row">
           <div class="col-12">
              <div class="breadcromb-box">
                 <h3>{{ __('text.contact_us') }}</h3>
                 <ul>
                    <li><i class="fa fa-home"></i></li>
                    <li><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{ __('text.contact_us') }}</li>
                 </ul>
              </div>
           </div>
        </div>
     </div>
  </section>
<!-- Breadcrumb Area End -->


<!-- Contact Area Start -->
      <section class="fag-contact-details-area section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-4">
                  <div class="single-contact-box">
                     <div class="contact-icon">
                        <i class="fa fa-map-marker"></i>
                     </div>
                     <div class="contact-head">
                        <h4>Location</h4>
                     </div>
                     <div class="contact-text">
                        <p>City Street Suice 2/A Sydney, <br> Australia 58000</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="single-contact-box">
                     <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                     </div>
                     <div class="contact-head">
                        <h4>Phones</h4>
                     </div>
                     <div class="contact-text">
                        <p>+008 - 5069 - 9600</p>
                        <p>+009 - 5069 - 5801</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="single-contact-box">
                     <div class="contact-icon">
                        <i class="fa fa-envelope"></i>
                     </div>
                     <div class="contact-head">
                        <h4>Email</h4>
                     </div>
                     <div class="contact-text">
                        <p>support@example.com</p>
                        <p>info@example.com</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Contact Area End -->
       
       
      <!-- Contact Form Start -->
      <section class="fag-contact-form section_100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">Send <span>Message</span></h2>
                     <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="contact-form-inn">
                     <form action=" {{ route('contact-us',app()->getLocale()) }}" method="post">
                                        @csrf
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="comment-field">
                                 <input class="ns-com-name" name="name" placeholder="Name" type="text">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="comment-field">
                                 <input class="ns-com-name" name="email" placeholder="Email" type="email">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="comment-field">
                                 <textarea class="comment" placeholder="Write your message here..." name="comment"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="comment-field form-action">
                                 <button type="submit" class="fag-btn">Send Message </button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Contact Form End -->
@endsection