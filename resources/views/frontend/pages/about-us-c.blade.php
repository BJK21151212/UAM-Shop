@extends('frontend.layouts.master-c')

@section('title','E-SHOP || About Us')

@section('main-content')
		<main class="main about">
            <div class="page-header page-header-bg text-left"
                style="background: 50%/cover #D4E1EA url('{{asset('frontend-c/assets/images/page-header-bg.jpg')}}');">
                <div class="container">
                    <h1><span>ABOUT US</span>
                        OUR COMPANY</h1>
                    <a href="{{route('contact')}}" class="btn btn-dark">Contact</a>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo1.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
            <div class="about-section">
				<div class="container">
					<h2 class="subtitle">ABOUT NWB </h2>
                    <p><i>Bringing the World to Your Doorstep Since 2020</i></p>

                        <p><b>Welcome to <b>NWB</b> - Your Passport to Global Shopping!</b></p>

					<p>Founded in the vibrant heart of Dar es Salaam, Tanzania, in 2020, <b>NWB</b> (Natural Wealthy Business) is not just an e-commerce company; 
                        we are a gateway to the world's treasures. Our journey began with a vision: to make international shopping accessible, convenient, 
                        and secure for every Tanzanian. </p>
					<p>At <b>NWB</b>, our mission is to enrich your life with the diversity of global products. We believe that the world's finest 
                        goods should be within reach, and we work tirelessly to curate and deliver them to your doorstep.</p>


                    <h2 class="subtitle">Our Commitment</h2>
                    
<p>
                        <b>Quality Assurance: </b>We stand by the quality of our products, sourced from trusted suppliers globally.
                        Your satisfaction is our benchmark.<br>

                        <b>Payment Security:</b> Your financial information is protected through our secure payment channels,
                        guaranteeing peace of mind with every transaction.<br>

                        <b>Customer-Centric: </b>We go the extra mile to ensure your shopping experience is exceptional. 
                        Your happiness is our measure of success.</p>


                    <h2 class="subtitle">Unlock a World of Possibilities</h2>
                    
                    <p>Explore the world's riches with NWB. Whether it's global market from China, fashion from Paris, electronics from Tokyo, or spices from India,
                     we bring the world to you. Our user-friendly platform ensures a seamless shopping journey from discovery to delivery.</p>


					<p class="lead">“ Join Our Global Family

                        NWB is more than a marketplace; we are a community of global shoppers. Together, we celebrate diversity and the thrill of discovering 
                        new treasures from around the world.<br>

                        Thank you for choosing NWB as your trusted partner for international shopping. We eagerly anticipate 
                        serving you and turning your global shopping aspirations into reality.”</p>
				</div><!-- End .container -->
			</div><!-- End .about-section -->
            

            <div class="features-section bg-gray">
                <div class="container">
                    <h2 class="subtitle">WHY CHOOSE US</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="feature-box bg-white">
                                <i class="icon-shipped"></i>
                                <div class="feature-box-content p-0">
                                    <h3>Global Connections</h3>
                                    <p>We've nurtured strong relationships with suppliers worldwide, enabling us to offer an ever-expanding selection
                                         of products from every corner of the globe.</p>
                                         
                                            
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-lg-4">
                            <div class="feature-box bg-white">
                                <i class="icon-us-dollar"></i>

                                <div class="feature-box-content p-0">
                                    <h3>100% Money Back Guarantee</h3>
                                    <p>Payment convenience is our priority. That's why we offer multiple payment options i.e
                                        mobile money payments like M-Pesa,Tigo-Pesa, online payment platforms, and bank transfers.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-lg-4">
                            <div class="feature-box bg-white">
                                <i class="icon-online-support"></i>

                                <div class="feature-box-content p-0">
                                    <h3>Online Support 24/7</h3>
                                    <p>Our mode of business is rooted in the direct acquisition of goods. We can also fulfill specific 
                                        orders on your behalf, ensuring you access the products that matter most to you.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .features-section -->

            <div class="testimonials-section">
                <div class="container">
                    <h2 class="subtitle text-center">HAPPY CLIENTS</h2>

                    <div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
						'margin': 20,
                        'lazyLoad': true,
                        'autoHeight': true,
                        'dots': false,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '992': {
                                'items': 2
                            }
                        }
                    }">
                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{asset('frontend-c/assets/images/clients/client1.png')}}" alt="client">
                                </figure>

                                <div>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>SMARTWAVE CEO</span>
                                </div>
                            </div><!-- End .testimonial-owner -->

                            <blockquote>
                                <p>I can't express how thrilled I am with my recent purchase from NWB.
                                     The product quality exceeded my expectations, and the customer service was exceptional. I'll definitely be shopping here again!</p>
                            </blockquote>
                        </div><!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{asset('frontend-c/assets/images/clients/client2.png')}}" alt="client">
                                </figure>

                                <div>
                                    <strong class="testimonial-title">Bob Smith</strong>
                                    <span>SMARTWAVE CEO</span>
                                </div>
                            </div><!-- End .testimonial-owner -->

                            <blockquote>
                                <p>What I love about NWB is the wide variety of products they offer.
                                     It's like a treasure trove of unique finds from around the world. I always discover something new and exciting.</p>
                            </blockquote>
                        </div><!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{asset('frontend-c/assets/images/clients/client1.png')}}" alt="client">
                                </figure>

                                <div>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>SMARTWAVE CEO</span>
                                </div>
                            </div><!-- End .testimonial-owner -->

                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
                                    dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
                            </blockquote>
                        </div><!-- End .testimonial -->
                    </div><!-- End .testimonials-slider -->
                </div><!-- End .container -->
            </div><!-- End .testimonials-section -->

            <div class="counters-section bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count-to" data-fromvalue="0" data-tovalue="200" data-duration="2000"
                                    data-append="+">0</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">MILLION CUSTOMERS</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count-to" data-fromvalue="0" data-tovalue="1800" data-duration="2000"
                                    data-append="+">0</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">TEAM MEMBERS</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper line-height-1">
                                <span class="count-to" data-fromvalue="0" data-tovalue="24" data-duration="2000"
                                    data-append="HR">0</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">SUPPORT AVAILABLE</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper">
                                <span class="count-to" data-fromvalue="0" data-tovalue="265" data-duration="2000"
                                    data-append="+">0</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">SUPPORT AVAILABLE</h4>
                        </div><!-- End .col-md-4 -->

                        <div class="col-6 col-md-4 count-container">
                            <div class="count-wrapper line-height-1">
                                <span class="count-to" data-fromvalue="0" data-tovalue="99" data-duration="2000"
                                    data-append="%">0</span>
                            </div><!-- End .count-wrapper -->
                            <h4 class="count-title">SUPPORT AVAILABLE</h4>
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .counters-section -->
        </main><!-- End .main -->


	{{-- @include('frontend.layouts.newsletter') --}}
@endsection
