<div class="modal fade " id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
                    <div class="modal-wrapper login-popup"> 
                        <div class="col">
                            <div class="container">
                                <h2 class="title">Login</h2>
                            </div>
                
                            <form action="{{route('login.submit')}}" method="post">
                                @csrf
                                <label for="login-email">
                                    Username or email address
                                    <span class="required">*</span>
                                </label>
                                <input type="email" name="email" placeholder="" value="{{old('email')}}" class="form-input form-wide" id="login-email" required />
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <label for="login-password">
                                    Password
                                    <span class="required">*</span>
                                </label>
                                <input type="password" name="password" class="form-input form-wide" id="login-password" required />
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="form-footer">
                                    <div class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" id="lost-password" />
                                        <label class="custom-control-label mb-0" for="lost-password">Remember
                                            me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="forgot-password.html"
                                            class="forget-password text-dark form-footer-right">Forgot
                                            Password?</a>   
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-dark w-50">
                                    LOGIN
                                </button>
                                <a href="{{route('register.form')}}" class="btn  w-20">Register</a>
                            </form>
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close close" data-dismiss="modal">
                            ×
                        </button>
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->
            </div> 
        </div>
    </div>

</div><!-- End .product-single-container -->
<footer class="footer bg-dark position-relative">
            <div class="footer-middle">
                <div class="container position-static">
                    <div class="footer-ribbon">Get in touch</div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <a href="demo1.html">
                                    <img src="{{asset('frontend-c/assets/images/logo-footer.png')}}" alt="Logo" class="logo-footer">
                                </a>
                                <p class="m-b-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Duis nec vestibulum magna, et dapibus lacus.</p>
                                <a href="#" class="read-more text-white">read more...</a>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                            <div class="widget mb-2">
                                <h4 class="widget-title mb-1 pb-1">Contact Info</h4>
                                <ul class="contact-info m-b-4">
                                    <li>
                                        <span class="contact-info-label">Address:</span>123 Street Name, City, England
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span><a href="tel:">(123) 456-7890</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="#"><span class="__cf_email__" data-cfemail="274a464e4b67425f464a574b420944484a">[email&#160;protected]</span></a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                            <div class="widget">
                                <h4 class="widget-title pb-1">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="#">Help & FAQs</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Shipping & Delivery</a></li>
                                    <li><a href="#">Orders History</a></li>
                                    <li><a href="#">Advanced Search</a></li>
                                    <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="demo1-about.html">About Us</a></li>
                                    <li><a href="#">Corporate Sales</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3 col-sm-6 pb-0">
                            <div class="widget mb-1 mb-sm-3">
                                <h4 class="widget-title">Popular Tags</h4>

                                <div class="tagcloud">
                                    <a href="#">Bag</a>
                                    <a href="#">Black</a>
                                    <a href="#">Blue</a>
                                    <a href="#">Clothes</a>
                                    <a href="#">Fashion</a>
                                </div>

                            </div>
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Subscribe newsletter</h4>
                                <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                                </p>
                                <form action="{{route('subscribe')}}" method="post" class="mb-0">
                                    @csrf
                                    <input type="email" name="email" class="form-control m-b-3" placeholder="Email address" required>

                                    <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                                </form>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
                    </div>

                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <div class="payment-icons">
                            <span class="payment-icon visa" style="background-image: url({{asset('frontend-c/assets/images/payments/payment-visa.svg')}})"></span>
                            <span class="payment-icon paypal" style="background-image: url({{asset('frontend-c/assets/images/payments/payment-paypal.svg')}})"></span>
                            <span class="payment-icon stripe" style="background-image: url({{asset('frontend-c/assets/images/payments/payment-stripe.png')}})"></span>
                            <span class="payment-icon verisign" style="background-image:  url({{asset('frontend-c/assets/images/payments/payment-verisign.svg')}})"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .footer-bottom -->
        </footer>
        <!-- End .footer -->
   
