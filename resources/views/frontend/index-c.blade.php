@extends('frontend.layouts.master-c')
@section('meta')
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
@endsection
@section('title','E-SHOP || HOME PAGE')

@section('main-content')

<main class="main">
   
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{'loop': false}">
        @if(count($banners)>0)
        @foreach($banners as $key=>$banner)
            <div class="home-slide home-slide1 banner">

                <img class="slide-bg" src="{{$banner->photo}}" width="1903" height="499" alt="slider image">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <h4 class="text-transform-none m-b-3"><p>{!! html_entity_decode($banner->description) !!}</p></h4>
                        <h2 class="text-transform-none mb-0">{{$banner->title}}</h2>
                        <h3 class="m-b-3">{!! html_entity_decode($banner->description) !!}</h3>
                        <h5 class="d-inline-block mb-0">
                            <span>Starting At</span>
                            <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em
                                    class="align-text-top">199</em><sup>99</sup></b>
                        </h5>
                        <a href="{{route('product-grids')}}" class="btn btn-dark btn-lg">Shop Now!</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
            </div>
        @endforeach
        <!-- End .home-slide -->
        @endif
    </div>
    <!-- End .home-slider -->

    <div class="container">
        <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
            'dots': false,
            'loop': false,
            'responsive': {
                '576': {
                    'items': 2
                },
                '992': {
                    'items': 3
                }
            }
            }">
            <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>

                <div class="info-box-content">
                    <h4>FREE SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping on all orders over $99.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->
        </div>
        <!-- End .info-boxes-slider -->

        <div class="banners-container mb-2">
            <div class="banners-slider owl-carousel owl-theme" data-owl-options="{
                'dots': false
            }">
                <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{asset('frontend-c/assets/images/demoes/demo4/banners/banner-1.jpg')}}" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer">
                        <h3 class="m-b-2">Porto Watches</h3>
                        <h4 class="m-b-3 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                        <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                    </div>
                </div>
                <!-- End .banner -->

                <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <figure class="w-100">
                        <img src="{{asset('frontend-c/assets/images/demoes/demo4/banners/banner-2.jpg')}}" style="background-color: #ccc;" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-center">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-7 text-lg-right">
                                <h3>Deal Promos</h3>
                                <h4 class="pb-4 pb-lg-0 mb-0 text-body">Starting at $99</h4>
                            </div>
                            <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->

                <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{asset('frontend-c/assets/images/demoes/demo4/banners/banner-3.jpg')}}" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-right">
                        <h3 class="m-b-2">Handbags</h3>
                        <h4 class="m-b-2 text-secondary text-uppercase">Starting at $99</h4>
                        <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
        </div>
    </div>
    <!-- End .container -->

    <section class="featured-products-section">
        @php
    $featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(10)->get();
        @endphp
         @php
         $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
         // dd($categories);
     @endphp
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{
                'dots': false,
                'nav': true
            }">
            @if($featured)
            @foreach($featured as $data)
            
            <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="{{route('product-detail',$data->slug)}}">

                            @php
                                $photo=explode(',',$data->photo);
                            @endphp
                            @if(count($photo) > 1)
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}" width="220" height="220" >
                            <img src="{{$photo[1]}}" alt="{{$photo[1]}}" width="220" height="220" >
                            @else
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}" width="220" height="220" >
                            @endif

                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-{{$data->discount}}%</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        {{-- <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div> --}}
                        <h3 class="product-title">
                            <a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">${{$data->price}}</del>Up to
                            <span class="product-price">{{$data->discount}}% Discount</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="{{route('add-to-wishlist',$data->slug)}}" class="btn-icon-wish" title="wishlist"><i
                                    class="icon-heart"></i></a>
                            <a href="{{route('product-detail',$data->slug)}}" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>SELECT
                                    OPTIONS</span></a>
                                <a data-toggle="modal" data-target="#{{$data->id}}" href="#{{$data->id}}" title="Quick View" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                @endforeach
                @endif
            </div>
           
            <!-- End .featured-proucts -->
        </div>
    </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2" data-owl-options="{
                    'dots': false,
                    'nav': true,
                    'responsive': {
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5
                            }
                        }
                    }">
                    @php
                    $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(10)->get(); 
                                   
                    $category_lists=DB::table('categories')->where('status','active')->limit(10)->get();
                    
                    $sort=DB::table('products') ->where('cat_id',$category_lists[0]->id)->limit(10)->get();  
                        // dd($sort);    
                    @endphp
                @foreach($product_lists as $product)
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="{{route('product-detail',$product->slug)}}">
                            @php
                                $photo=explode(',',$product->photo);// dd($photo);
                            @endphp
                            @if(count($photo) > 1)
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}" width="220" height="220" >
                            <img src="{{$photo[1]}}" alt="{{$photo[1]}}" width="220" height="220" >
                            @else
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}" width="220" height="220" >
                            @endif
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                    </figure>
                    
                                <div class="product-details">
                                    {{-- <div class="category-list">
                                        <a href="category.html" class="product-category">Category</a>
                                    </div> --}}
                                    <h3 class="product-title">
                                        <a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                    </h3>
                                    
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">${{number_format($product->price,2)}}</del>
                                        @php
                                    $after_discount=($product->price-($product->price*$product->discount)/100)
                                    @endphp
                                        <span class="product-price">${{number_format($after_discount,2)}}</span>
                                    </div>
                                 
                                
                                    <!-- End .price-box -->
                                    <div class="product-action">
                                        <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn-icon-wish" title="wishlist"><i
                                                class="icon-heart"></i></a>
                                        <a href="{{route('add-to-cart',$product->slug)}}" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                                <a data-toggle="modal" data-target="#{{$product->id}}" href="#{{$product->id}}" title="Quick View" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                    
                                </div>
                            
                    <!-- End .product-details -->
                </div>                
                @endforeach
            </div>
            <!-- End .featured-proucts -->

            <div class="banner banner-big-sale appear-animate" data-animation-delay="200" data-animation-name="fadeInUpShorter" style="background: #2A95CB center/cover url('assets/images/demoes/demo4/banners/banner-4.jpg');">
                <div class="banner-content row align-items-center mx-0">
                    <div class="col-md-9 col-sm-8">
                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up to 70% off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="category.html">View Sale</a>
                    </div>
                </div>
            </div>

            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories
            </h2>

            @php
            $category_lists=DB::table('categories')->where('status','active')->limit(10)->get();
            @endphp

            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">

                @if($category_lists)
                    @foreach($category_lists as $cat)
                        @if($cat->is_parent==1)

                            <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                                <a href="{{route('product-cat',$cat->slug)}}">
                                    @if($cat->photo)
                                        
                                                                                
                                            <img src="{{$cat->photo}}">
                                        
                                    @else
                                        <figure>                                            
                                            <img src="https://via.placeholder.com/600x370" alt="#">
                                        </figure>
                                    @endif


                                    <div class="category-content">
                                        <h3>{{$cat->title}}</h3>
                                        @php $product_cat_num=DB::table('products')->where('cat_id',$cat->id)->count();@endphp
                                        <span><mark class="count">

                                            {{$product_cat_num}}
                                        
                                        </mark> products</span>
                                        
                                    </div>
                                </a>
                            </div>
                        @endif
                        <!-- /End Single Category  -->
                    @endforeach
                @endif
           
            
       

                {{-- <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/demoes/demo4/products/categories/category-3.jpg" alt="category" width="220" height="220" />
                        </figure>
                        <div class="category-content">
                            <h3>Machine</h3>
                            <span><mark class="count">3</mark> products</span>
                        </div>
                    </a>
                </div>

                <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/demoes/demo4/products/categories/category-4.jpg" alt="category" width="220" height="220" />
                        </figure>
                        <div class="category-content">
                            <h3>Sofa</h3>
                            <span><mark class="count">3</mark> products</span>
                        </div>
                    </a>
                </div>

                <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/demoes/demo4/products/categories/category-6.jpg" alt="category" width="220" height="220" />
                        </figure>
                        <div class="category-content">
                            <h3>Headphone</h3>
                            <span><mark class="count">3</mark> products</span>
                        </div>
                    </a>
                </div>

                <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="category.html">
                        <figure>
                            <img src="assets/images/demoes/demo4/products/categories/category-5.jpg" alt="category" width="220" height="220" />
                        </figure>
                        <div class="category-content">
                            <h3>Sports</h3>
                            <span><mark class="count">3</mark> products</span>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-earphones-alt"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Customer Support</h3>
                            <h5>You Won't Be Alone</h5>

                            <p>We really care about you and your website as much as you do. Purchasing Porto or any other theme from us you get 100% free support.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Fully Customizable</h3>
                            <h5>Tons Of Options</h5>

                            <p>With Porto you can customize the layout, colors and styles within only a few minutes. Start creating an amazing website right now!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-action-undo"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Powerful Admin</h3>
                            <h5>Made To Help You</h5>

                            <p>Porto has very powerful admin features to help customer to build their own shop in minutes without any special skills in web development.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container-->
    </section>
    <!-- End .feature-boxes-container -->

    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                    <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive
                            COUPON</b></h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section pb-0">
        <div class="container">
            <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                Latest News</h2>

            <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-owl-options="{
                'loop': false,
                'margin': 20,
                'autoHeight': true,
                'autoplay': false,
                'dots': false,
                'items': 2,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '480': {
                        'items': 2
                    },
                    '576': {
                        'items': 3
                    },
                    '768': {
                        'items': 4
                    }
                }
            }">
            @if($posts)
                @foreach($posts as $post)
                    <article class="post">
                        <div class="post-media">
                            <a href="{{route('blog.detail',$post->slug)}}">
                                <img src="{{$post->photo}}" alt="Post" width="225" height="280">
                            </a>
                            <div class="post-date">
                                <span class="day">{{$post->created_at->format('d')}}</span>
                                <span class="month">{{$post->created_at->format('D')}}</span>
                            </div>
                        </div>
                        <!-- End .post-media -->

                        <div class="post-body">
                            <h2 class="post-title">
                                <a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a>
                            </h2>
                            <div class="post-content">
                                <p>{!! html_entity_decode(substr($post->description,150,300)) !!}...</p>
                                <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">Continue Reading</a>
                            </div>
                            <!-- End .post-content -->
                            <a href="{{route('blog.detail',$post->slug)}}" class="post-comment">{{$post->allComments->count()}} Comments</a>
                        </div>
                        <!-- End .post-body -->
                    </article>
                <!-- End .post -->
                @endforeach
            @endif
            </div>
            <!-- End .row -->
        </div>
    </section>
</main>

<!-- End .main -->
{{-- featured modal --}}
@if($featured)
@foreach($featured as $key=>$product)
<div class="modal fade " id="{{$product->id}}" tabindex="-3" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-single-container product-single-default product-quick-view mb-0" id="{{$product->id}}" tabindex="-1" role="dialog">
                    <div class="row">
                        <div class="col-md-6 product-single-gallery mb-md-0">
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <!---->
                                    <div class="product-label label-sale">
                                        -{{$product->discount}}%
                                    </div>
                                </div>
                
                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    @php
                                    $photo=explode(',',$product->photo);
                                // dd($photo);
                                    @endphp
                                    @foreach($photo as $data)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{$data}}"
                                                data-zoom-image="{{$data}}" />
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End .product-single-carousel -->
                            </div>
                            <div class="prod-thumbnail owl-dots">
                                @foreach($photo as $data)
                                        <div class="owl-dot">
                                            <img src="{{$data}}" />
                                        </div>
                                @endforeach
                            </div>
                        </div><!-- End .product-single-gallery -->
                
                        <div class="col-md-6">
                            <div class="product-single-details mb-0 ml-md-4">
                                <h1 class="product-title">{{$product->title}}</h1>
            
                                @php
                                    $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                    $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                @endphp

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                
                                    <a href="#" class="rating-link">( {{$rate_count}} Reviews )</a>
                                </div><!-- End .ratings-container -->
                
                                <hr class="short-divider">
                
                                <div class="price-box">
                                    @php
                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
									<del class="old-price">${{number_format($product->price,2)}}</del>
									<span class="product-price">${{number_format($after_discount,2)}}</span>
                                </div><!-- End .price-box -->
                
                                <div class="product-desc">
                                    <p>
                                        {!! html_entity_decode($product->summary) !!}
                                    </p>
                                </div><!-- End .product-desc -->
                
                                {{-- <ul class="single-info-list">
                                    <!---->
                                    <li>
                                        SKU:
                                        <strong>654613612</strong>
                                    </li>
                
                                    <li>
                                        CATEGORY:
                                        <strong>
                                            <a href="#" class="product-category">SHOES</a>
                                        </strong>
                                    </li>
                                    </ul>
                                --}}
                                <div class="product-filters-container">
                                    <div class="product-single-filter">
                                        <label>Size:</label>
                                        <ul class="config-size-list">
                                            @php
                                                $sizes=explode(',',$product->size);
                                                 // dd($sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                            <li><a href="javascript:;" class="d-flex align-items-center justify-content-center">{{$size}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                
                                    <div class="product-single-filter">
                                        <label></label>
                                        <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                    </div>
                                    <!---->
                                </div>
            
                                <form action="{{route('single-add-to-cart')}}" method="POST">
                                    @csrf
                                <div class="product-action">
                                    <div class="price-box product-filtered-price">
                                        @php
                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
									<del class="old-price">${{number_format($product->price,2)}}</del>
									<span class="product-price">${{number_format($after_discount,2)}}</span>
                                    </div>
                                    <input type="hidden" name="slug" value="{{$product->slug}}">
                                    <div class="product-single-qty">
                                        <input name="quant[1]" class="horizontal-quantity form-control" type="text" data-min="1" data-max="1000" value="1" />
                                    </div><!-- End .product-single-qty -->
                
                                    <button type="submit" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to Cart</button>
                
                                    <a href="{{route('cart')}}" class="btn view-cart d-none">View cart</a>
                                </div><!-- End .product-action -->
                                </form>
                
                                <hr class="divider mb-0 mt-0">
                
                                <div class="product-single-share mb-0">
                                    <label class="sr-only">Share:</label>
                
                                    <div class="social-icons mr-2">
                                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                            title="Facebook"></a>
                                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                            title="Linkedin"></a>
                                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                            title="Google +"></a>
                                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                    </div><!-- End .social-icons -->
                
                                    <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                            class="icon-wishlist-2"></i><span>Add to
                                            Wishlist</span></a>
                                </div><!-- End .product single-share -->
                            </div>
                        </div><!-- End .product-single-details -->
                
                        <button title="Close (Esc)" type="button" class="mfp-close close" data-dismiss="modal">
                            ×
                        </button>
                    </div><!-- End .row -->
                </div>
            </div> 
        </div>
    </div>

</div><!-- End .product-single-container -->
@endforeach
@endif
<!-- featured Modal end -->

{{-- newaravial modal --}}
@if($product_lists)
@foreach($product_lists as $key=>$product)
<div class="modal fade " id="{{$product->id}}" tabindex="-3" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-single-container product-single-default product-quick-view mb-0" id="{{$product->id}}" tabindex="-1" role="dialog">
                    <div class="row">
                        <div class="col-md-6 product-single-gallery mb-md-0">
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <!---->
                                    <div class="product-label label-sale">
                                        -{{$product->discount}}%
                                    </div>
                                </div>
                
                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    @php
                                    $photo=explode(',',$product->photo);
                                // dd($photo);
                                    @endphp
                                    @foreach($photo as $data)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{$data}}"
                                                data-zoom-image="{{$data}}" />
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End .product-single-carousel -->
                            </div>
                            <div class="prod-thumbnail owl-dots">
                                @foreach($photo as $data)
                                        <div class="owl-dot">
                                            <img src="{{$data}}" />
                                        </div>
                                @endforeach
                            </div>
                        </div><!-- End .product-single-gallery -->
                
                        <div class="col-md-6">
                            <div class="product-single-details mb-0 ml-md-4">
                                <h1 class="product-title">{{$product->title}}</h1>
            
                                @php
                                    $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                    $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                @endphp

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                
                                    <a href="#" class="rating-link">( {{$rate_count}} Reviews )</a>
                                </div><!-- End .ratings-container -->
                
                                <hr class="short-divider">
                
                                <div class="price-box">
                                    @php
                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
									<del class="old-price">${{number_format($product->price,2)}}</del>
									<span class="product-price">${{number_format($after_discount,2)}}</span>
                                </div><!-- End .price-box -->
                
                                <div class="product-desc">
                                    <p>
                                        {!! html_entity_decode($product->summary) !!}
                                    </p>
                                </div><!-- End .product-desc -->
                
                                {{-- <ul class="single-info-list">
                                    <!---->
                                    <li>
                                        SKU:
                                        <strong>654613612</strong>
                                    </li>
                
                                    <li>
                                        CATEGORY:
                                        <strong>
                                            <a href="#" class="product-category">SHOES</a>
                                        </strong>
                                    </li>
                                    </ul>
                                --}}
                                <div class="product-filters-container">
                                    <div class="product-single-filter">
                                        <label>Size:</label>
                                        <ul class="config-size-list">
                                            @php
                                                $sizes=explode(',',$product->size);
                                                 // dd($sizes);
                                            @endphp
                                            @foreach($sizes as $size)
                                            <li><a href="javascript:;" class="d-flex align-items-center justify-content-center">{{$size}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                
                                    <div class="product-single-filter">
                                        <label></label>
                                        <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                    </div>
                                    <!---->
                                </div>
            
                                <form action="{{route('single-add-to-cart')}}" method="POST">
                                    @csrf
                                <div class="product-action">
                                    <div class="price-box product-filtered-price">
                                        @php
                                        $after_discount=($product->price-($product->price*$product->discount)/100);
                                    @endphp
									<del class="old-price">${{number_format($product->price,2)}}</del>
									<span class="product-price">${{number_format($after_discount,2)}}</span>
                                    </div>
                                    <input type="hidden" name="slug" value="{{$product->slug}}">
                                    <div class="product-single-qty">
                                        <input name="quant[1]" class="horizontal-quantity form-control" type="text" data-min="1" data-max="1000" value="1" />
                                    </div><!-- End .product-single-qty -->
                
                                    <button type="submit" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to Cart</button>
                
                                    <a href="{{route('cart')}}" class="btn view-cart d-none">View cart</a>
                                </div><!-- End .product-action -->
                                </form>
                
                                <hr class="divider mb-0 mt-0">
                
                                <div class="product-single-share mb-0">
                                    <label class="sr-only">Share:</label>
                
                                    <div class="social-icons mr-2">
                                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                            title="Facebook"></a>
                                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                        <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                            title="Linkedin"></a>
                                        <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                            title="Google +"></a>
                                        <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                    </div><!-- End .social-icons -->
                
                                    <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                            class="icon-wishlist-2"></i><span>Add to
                                            Wishlist</span></a>
                                </div><!-- End .product single-share -->
                            </div>
                        </div><!-- End .product-single-details -->
                
                        <button title="Close (Esc)" type="button" class="mfp-close close" data-dismiss="modal">
                            ×
                        </button>
                    </div><!-- End .row -->
                </div>
            </div> 
        </div>
    </div>

</div><!-- End .product-single-container -->
@endforeach
@endif
<!-- new araival Modal end -->

@endsection