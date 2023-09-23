@extends('frontend.layouts.master-c')

@section('title','E-SHOP || PRODUCT PAGE')

@section('main-content')

<main class="main">
    <div class="category-banner-container bg-gray">
        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('assets/images/banners/banner-top.jpg');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-5 pb-5 pb-md-0 col-md-5 col-xl-4 col-lg-4 offset-1">
                        <h3>Electronic
                            <br>Deals</h3>
                        <a href="category.html" class="btn btn-dark">Get Yours!</a>
                    </div>
                    <div class="pl-lg-3 col-md-4 offset-md-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON
                            </h4>
                            <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0">
                                <i class="ls-0">UP TO</i>
                                <b class="text-dark">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Shop List</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 order-lg-1">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        {{-- <a href="#" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path
                                    d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path
                                    d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a> --}}

                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>

                            <div class="select-custom">
                                <select name="orderby" class="form-control" onchange="this.form.submit();">
                                    <option value="menu_order" selected="selected">Default</option>
                                    <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Name</option>
									<option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price</option>
									<option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Category</option>
									<option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Brand</option>
								</select>
                            </div>
                            <!-- End .select-custom -->


                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control" onchange="this.form.submit();">
                                    <option value="">Default</option>
									<option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
									<option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
									<option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
									<option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
								</select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="{{route('product-grids')}}" class="layout-btn btn-grid" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="javascript:void(0)" class="layout-btn btn-list active" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav>

                <div class="row pb-4">
                    @if(count($products))
					    @foreach($products as $product)
                            <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <figure>
                                    <a href="{{route('product-detail',$product->slug)}}">
                                        @php 
											$photo=explode(',',$product->photo);
										@endphp
                                        <img src="{{$photo[0]}}" width="250" height="250" alt="product" />
                                        <img src="{{$photo[0]}}" width="250" height="250" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    {{-- <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div> --}}
                                    <h3 class="product-title"> <a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <p class="product-description">{!! html_entity_decode($product->summary) !!}</p>
                                    <div class="price-box">
                                        @php
											$after_discount=($product->price-($product->price*$product->discount)/100);
										@endphp
										<span class="product-price">${{number_format($after_discount,2)}}</span>
										<del class="product-price">${{number_format($product->price,2)}}</del>
                                    </div>
                                    <!-- End .price-box -->
                                    <div class="product-action">
                                        <a href="{{route('add-to-cart',$product->slug)}}" class="btn-icon btn-add-cart product-type-simple">
                                            <i class="icon-shopping-cart"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                        <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn-icon-wish" title="wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                        <a data-toggle="modal" data-target="#{{$product->id}}" href="#{{$product->id}}" title="Quick View" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                </div>
                                <!-- End .product-details -->
                            </div>
                        @endforeach
                    @else
                        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
                    @endif
                </div>

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control" onchange="this.form.submit();">
                                <option value="">Default</option>
                                <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
                                <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
                                <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
                                <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->
                    {{-- {{$products->appends($_GET)->links()}}  --}}

                </nav>
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            
                {{-- sidebar start --}}
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <form action="{{route('shop.filter')}}" method="POST">
                        @csrf
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                        @php
                                            // $category = new Category();
                                            $menu=App\Models\Category::getAllParentWithChild();
                                        @endphp
                                        @if($menu)
                                                @foreach($menu as $cat_info)
                                                    @if($cat_info->child_cat->count()>0)
                                                    <li>
                                                        <a href="#widget-category-1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="widget-category-1">
                                                        {{$cat_info->title}}<span class="products-count">({{$cat_info->child_cat->count()}})</span>
                                                            <span class="toggle"></span>
                                                        </a>
                                                        <div class="collapse show" id="widget-category-1">
                                                            <ul class="cat-sublist">
                                                                @foreach($cat_info->child_cat as $sub_menu)
                                                                    <li><a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">{{$sub_menu->title}}</a><span class="products-count">(1)</span></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    @else
                                                        <li><a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}<span class="products-count"></span></a></li>
                                                    @endif
                                                @endforeach
                                        @endif
                                        {{-- @foreach(Helper::productCategoryList('products') as $cat)
                                            @if($cat->is_parent==1)
                                                <li><a href="{{route('product-cat',$cat->slug)}}">{{$cat->title}}</a></li>
                                            @endif
                                        @endforeach --}}
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body pb-0">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider"></div>
                                                <!-- End #price-slider -->
                                            </div>
                                            <!-- End .price-slider-wrapper -->

                                            <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range"></span>
                                                </div>
                                                <!-- End .filter-price-text -->

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                            <!-- End .filter-price-action -->
                                        </form>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <div class="widget widget-featured">
                                <h3 class="widget-title">Recent Producs</h3>

                                <div class="widget-body">
                                    <div class="owl-carousel widget-featured-products">
                                        <div class="featured-col">
                                            {{-- {{dd($recent_products)}} --}}
                                            @foreach($recent_products as $product)
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                @endphp
                                                    <a href="product.html">
                                                        <img src="{{$photo[0]}}" width="75" height="75" alt="product" />
                                                        <img src="{{$photo[0]}}" width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="product.html">{{$product->title}}</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:30%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->
                                                    @php
                                                        $org=($product->price-($product->price*$product->discount)/100);
                                                    @endphp
                                                    <div class="price-box">
                                                        <span class="product-price"><del class="text-muted">${{number_format($product->price,2)}}</del>   ${{number_format($org,2)}}</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- End .featured-col -->

                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/small/product-1.jpg" width="75" height="75" alt="product" />
                                                        <img src="assets/images/products/small/product-1-2.jpg" width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="product.html">Ultimate 3D
                                                            Bluetooth Speaker</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/small/product-2.jpg" width="75" height="75" alt="product" />
                                                        <img src="assets/images/products/small/product-2-2.jpg" width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="product.html">Brown Women Casual
                                                            HandBag</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/small/product-3.jpg" width="75" height="75" alt="product" />
                                                        <img src="assets/images/products/small/product-3-2.jpg" width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="product.html">Circled Ultimate
                                                            3D Speaker</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                        </div>
                                        <!-- End .featured-col -->
                                    </div>
                                    <!-- End .widget-featured-slider -->
                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .widget -->

                            <div class="widget widget-block">
                                <h3 class="widget-title">Custom HTML Block</h3>
                                <h5>This is a custom sub-title.</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
                            </div>
                            <!-- End .widget -->
                        </div>
                    </form>
                    <!-- End .sidebar-wrapper -->
                </aside>
                <!-- End .sidebar -->
            
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
</main>

{{-- modal --}}
@if($products)
@foreach($products as $key=>$product)
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
                                        <del class="old-price"><span>$286.00</span></del>
                                        <span class="product-price">$245.00</span>
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
<!-- Modal end -->

@endsection