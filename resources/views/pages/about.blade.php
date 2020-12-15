@extends('layouts.app')
@section('content')

<!-- Breadcrumb Area Start -->
      <section class="fag-breadcrumb-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="breadcromb-box">
                     <h3>{{ __('text.about_us') }}</span></h3>
                     <ul>
                        <li><i class="fa fa-home"></i></li>
                        <li><a href="{{ url(app()->getLocale(),'') }}">{{ __('text.Home') }}</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>{{ __('text.about_us') }}</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->


<!-- About Area Start -->
      <section class="fag-about-area section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="about-top">
                     <h2><span>12 Years</span> in Games Experience</h2>
                     <p>Pastrami picanha pig filet mignon, hamburger landjaeger sirloin pancetta tenderloin tongue doner. Shoulder venison burgdoggen, doner shank short ribs ball tip cupim tongue. Shankle flank kevin pastrami bresaola pig ham. Pork beef venison landjaeger filet mignon.</p>
                     <p>Chicken doner salami meatloaf picanha, pastrami short ribs kevin. Venison beef burgdoggen pork loin bacon, cow turkey. Hamburger kevin sirloin chuck, meatloaf pig picanha pancetta ham shank rump.</p>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="fag-video-inn">
                     <img class="zooming" src="assets/img/video.jpg" alt="theater thumb">
                     <a class="play-video" href="https://www.youtube.com/watch?v=3SAuuHCOkyI">
                     <i class="fa fa-play"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- About Area End -->
       
       
      <!-- Counter Area Start -->
      <section class="fag-counter-area section_100">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="counter-box">
                     <h3 class="heading_animation"><span class="counter">2356</span></h3>
                     <h4>Happy Clients</h4>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="counter-box">
                     <h3 class="heading_animation"><span class="counter">350</span></h3>
                     <h4>Won awards</h4>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="counter-box">
                     <h3 class="heading_animation"><span class="counter">1245</span></h3>
                     <h4>New players</h4>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="counter-box">
                     <h3 class="heading_animation"><span class="counter">102</span></h3>
                     <h4>Countries players</h4>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Counter Area End -->
       
       
      <!-- Testimonial Area Start -->
      <section class="fag-testimonial-area section_100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">Player's <span>Review</span></h2>
                     <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="testimonial-slider owl-carousel">
                  <div class="single-testimonial">
                     <div class="testimonial-meta">
                        <div class="testimonial-thumb">
                           <img src="assets/img/testimonial-author-1.jpg" alt="testimonial" />
                        </div>
                        <div class="testimonial-title">
                           <h3>Stefanie Rashford</h3>
                           <p>Player</p>
                        </div>
                     </div>
                     <div class="testimonial-desc">
                        <p>Nullam orci dui, dictum et magna sollicitudin, tempor blandit erat. Maecenas suscipit tellus sit amet augue placerat fringilla a id lacus. Fusce tincidunt in leo lacinia condimentum.</p>
                     </div>
                  </div>
                  <div class="single-testimonial">
                     <div class="testimonial-meta">
                        <div class="testimonial-thumb">
                           <img src="assets/img/testimonial-author-2.jpg" alt="testimonial" />
                        </div>
                        <div class="testimonial-title">
                           <h3>Coby Sue</h3>
                           <p>Player</p>
                        </div>
                     </div>
                     <div class="testimonial-desc">
                        <p>Nullam orci dui, dictum et magna sollicitudin, tempor blandit erat. Maecenas suscipit tellus sit amet augue placerat fringilla a id lacus. Fusce tincidunt in leo lacinia condimentum.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Testimonial Area End -->
       
       
      <!-- Sponsor Area Start -->
      <section class="fag-sponsor-area section_100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="site-heading">
                     <h2 class="heading_animation">Our <span>Sponsors</span></h2>
                     <p>blanditiis praesentium voluptatum deleniti atque corrupti.accusamus et iusto odio corrupti.accusamus et iusto odioiusto odio dignissimos ducimus qui blanditiis</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="sponsor-box-item">
                     <div class="sponsor-heading">
                        <h4>Financial Sponsors</h4>
                     </div>
                     <div class="sponsor-box">
                        <ul>
                           <li><a href="#"><img src="assets/img/sponsor1.png" alt="sponsor" /></a></li>
                           <li><a href="#"><img src="assets/img/sponsor2.png" alt="sponsor" /></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="sponsor-box-item">
                     <div class="sponsor-heading">
                        <h4>Media Sponsors</h4>
                     </div>
                     <div class="sponsor-box">
                        <ul>
                           <li><a href="#"><img src="assets/img/sponsor9.png" alt="sponsor" /></a></li>
                           <li><a href="#"><img src="assets/img/sponsor3.png" alt="sponsor" /></a></li>
                           <li><a href="#"><img src="assets/img/sponsor8.png" alt="sponsor" /></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Sponsor Area End -->
       

@endsection