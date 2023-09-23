
    <div class="top-notice text-white bg-dark">
        <div class="container text-center">
            <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
            <a href="demo1-shop.html" class="category">MEN</a>
            <a href="demo1-shop.html" class="category">WOMEN</a>
            <small>* Limited time only.</small>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
        <!-- End .container -->
    </div>
    <!-- End .top-notice -->
<header class="header home">
    @php
    $settings=DB::table('settings')->get();
    
    @endphp
    <div class="header-top bg-primary text-uppercase">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                    <a href="#" class="pl-0"><i class="flag-us flag"></i>ENG</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                            </li>
                            <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <div class="header-dropdown ml-3 pl-1">
                    <a href="#">USD</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->
            </div>
            <!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                <p class="top-message mb-0 d-none d-sm-block">Welcome To Porto!</p>
                <div class="header-dropdown dropdown-expanded mr-3">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="dashboard.html">My Account</a></li>
                            <li><a href="demo1-contact.html">Contact Us</a></li>
                            <li><a href="wishlist.html">My Wishlist</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="{{route('login')}}" class="login-link">Log In</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <span class="separator"></span>

                <div class="social-icons">
                    <a href="#" class="social-icon social-facebook icon-facebook ml-0" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter ml-0" target="_blank"></a>
                    <a href="#" class="social-icon social-instagram icon-instagram ml-0" target="_blank"></a>
                </div>
                <!-- End .social-icons -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle text-dark sticky-header">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                @php
                            $settings=DB::table('settings')->get();
                        @endphp
                <a href="{{route('home')}}" class="logo">
                    <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" width="111" height="44" alt="Porto Logo">
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-right w-lg-max pl-2">
                <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="{{route('product.search')}}" method="POST">
                        @csrf
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    @foreach(Helper::getAllCategory() as $cat)
                                    <option>{{$cat->title}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn icon-magnifier" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->

                <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                    <i class="icon-phone-2"></i>
                    <h6 class="pt-1 line-height-1">Call us now<a href="tel:#" class="d-block text-dark ls-10 pt-1">@foreach($settings as $data) {{$data->phone}} @endforeach</a></h6>
                </div>
                <!-- End .header-contact -->
               
                <a href="{{route('login')}}" class="header-icon header-icon-user">
                    <i class="icon-user-2"></i>
                @php 
                $total_prod=0;
                $total_amount=0;
                @endphp
                @if(session('wishlist'))
                @foreach(session('wishlist') as $wishlist_items)
                    @php
                        $total_prod+=$wishlist_items['quantity'];
                        $total_amount+=$wishlist_items['amount'];
                    @endphp
                @endforeach
                @endif
                <a href="{{route('wishlist')}}" class="header-icon">
                    <i class="icon-wishlist-2">

                    </i>
                </a>
                
                <div class="dropdown cart-dropdown">
                    <a href="{{route('cart')}}" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">{{Helper::cartCount()}}</span>
                    </a>

                    <div class="cart-overlay"></div>
                    @auth
                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">
                                @foreach(Helper::getAllProductFromCart() as $data)
                                @php
                                    $photo=explode(',',$data->product['photo']);
                                @endphp
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="{{route('product-detail',$data->product['slug'])}}">{{$data->product['title']}}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">{{$data->quantity}}</span> ×  ${{number_format($data->price,2)}}
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="demo1-product.html" class="product-image">
                                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}" width="80" height="80">
                                        </a>

                                        <a href="{{route('cart-delete',$data->id)}}" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                @endforeach
                            </div> 
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">${{number_format(Helper::totalCartPrice(),2)}}</span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{route('cart')}}" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="{{route('checkout')}}" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                            <!-- End .dropdown-cart-total -->
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div>
                    @endauth
                    <!-- End .dropdown-menu -->
                </div>
                
                <!-- End .dropdown -->
            </div>

            
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->
    <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu">
                            <li class="{{Request::path()=='home' ? 'active' : ''}}">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            {{Helper::getHeaderCategory()}}
                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif" ><a href="{{route('product-grids')}}">Products</a></li>
                            <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">Blog</a></li>
                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}" ><a href="{{route('about-us')}}">About Us</a></li>
                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">Contact Us</a></li>

                            <li class="float-right"><a href="https://1.envato.market/DdLk5" rel="noopener" class="pl-5" target="_blank">Buy Porto!</a></li>
                            <li class="float-right"><a href="#" class="pl-5">Special Offer!</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- End .container -->
     </div>
</header>
<!-- End .header -->