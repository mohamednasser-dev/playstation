<!-- Footer Area Start -->
      <footer class="fag-footer">
         <div class="footer-top-area">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12">
                     <div class="footer-logo">
                           <a href="{{ url('/') }}">
                           <img src="{{ asset('img/logo.png')}}" alt="site logo" />
                           </a>
                        </div>
                     <div class="single-footer">
                        <p>Etiam consequat sem ullamcorper, euismod metus sit amet, tristique justo.Vestibulum mattis, nisi ut faucibus commodo, risus ex commodo.</p>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-12">
                     <div class="widget-content">
                        <div class="row clearfix">
                           <div class=" col-lg-6 col-md-6 col-sm-12">
                              <div class="single-footer">
                                 <h3>Our Games</h3>
                                 <ul>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Need For Speed</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Call Of Duty</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Resident Evil</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Dragons Fight</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>2 Player Champions</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class=" col-lg-6 col-md-6 col-sm-12">
                              <div class="single-footer">
                                 <h3>Explore</h3>
                                 <ul>
                                    <li><a href="{{ url(session('locale'),'about') }}"><span class="fa fa-caret-right"></span>About</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Our Games</a></li>
                                    <li><a href="{{ url(session('locale'),'contact') }}"><span class="fa fa-caret-right"></span>Contact Us</a></li>
                                    <li><a href="#"><span class="fa fa-caret-right"></span>Help & Support</a></li>
                                    <li><a href="{{ url(session('locale'),'privacy') }}"><span class="fa fa-caret-right"></span>Privacy Policy</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class=" col-lg-3 col-md-6 col-sm-12">
                     <div class="single-footer">
                        <h3>{{ __('text.contact_us') }}</h3>
                        <div class="footer-contact">
                           <h4 class="title"><i class="fa fa-map-marker"></i>{{ __('text.Address') }} </h4>
                           <p>88 road, broklyn street<br>new york, usa</p>
                        </div>
                        <div class="footer-contact">
                           <h4 class="title"><i class="fa fa-pencil"></i>{{ __('text.email') }}</h4>
                           <p>info@example.com</p>
                        </div>
                        <div class="footer-contact">
                           <h4 class="title"><i class="fa fa-phone"></i>{{ __('text.phone') }} </h4>
                           <p>777-1234-567</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="footer-bottom-inn">
                        <div class="footer-logo">
                           <a href="{{ url('/',session('locale')) }}">
                           <img src="{{ asset('img/logo.png')}}" alt="site logo" />
                           </a>
                        </div>
                        <div class="footer-social">
                           <ul>
                              <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                              <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                              <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                              <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                              <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                           </ul>
                        </div>
                        <div class="copyright">
                           <p>{{ __('text.All_Rights_Reserved') }} &COPY;  <script>document.write(new Date().getFullYear());</script>  {{ config('app.name', 'Laravel') }}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer Area End -->
       