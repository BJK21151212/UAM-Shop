@extends('frontend.layouts.master-c')
@section('title','Wishlist Page')
@section('main-content')
<main class="main">
	<div class="page-header">
		<div class="container d-flex flex-column align-items-center">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{('home')}}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							Wishlist
						</li>
					</ol>
				</div>
			</nav>

			<h1>Wishlist</h1>
		</div>
	</div>

	<div class="container">
		<div class="wishlist-title">
			<h2 class="p-2">My wishlist</h2>
		</div>
		<div class="wishlist-table-container">
			<table class="table table-wishlist mb-0">
				<thead>
					<tr>
						<th class="thumbnail-col"></th>
						<th class="product-col">Product</th>
						<th class="price-col">Price</th>
						<th class="status-col">Stock Status</th>
					</tr>
				</thead>
				<tbody>
					@if(Helper::getAllProductFromWishlist())
						@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
						<tr class="product-row">
							@php 
								$photo=explode(',',$wishlist->product['photo']);
							@endphp
							<td>
								<figure class="product-image-container">
									<a href="product.html" class="product-image">
										<img src="{{$photo[0]}}" alt="{{$wishlist->product['title']}}">
									</a>

									<a href="{{route('wishlist-delete',$wishlist->id)}}" class="btn-remove icon-cancel" title="Remove Product"></a>
								</figure>
							</td>
							<td>
								<h5 class="product-title">
									<a href="{{route('product-detail',$wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a>
								</h5>
							</td>
							<td class="price-box">${{$wishlist['amount']}}</td>
							<td class="action">
								<button  data-toggle="modal" data-target="#{{$wishlist->id}}" class="btn btn-quickview mt-1 mt-md-0"
									title="Quick View">Quick
									View</button>
								<a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class="btn btn-dark btn-add-cart product-type-simple btn-shop">
									ADD TO CART
								</a>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td class="text-center">
								There are no any wishlist available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>

							</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div><!-- End .cart-table-container -->
	</div><!-- End .container -->
</main><!-- End .main -->
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
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
					<!-- Start Single Service -->
					<div class="info-box-content">
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="info-box info-box-icon-left">
					<i class="icon-money"></i>
					<!-- Start Single Service -->
					<div class="info-box-content">
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="info-box info-box-icon-left">
					<i class="icon-lock"></i>
					<!-- Start Single Service -->
					<div class="info-box-content">
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="info-box info-box-icon-left">
					<i class="icon-support"></i>
					<!-- Start Single Service -->
					<div class="info-box-content">
						<h4>Online Support</h4>
						<p>24/7 online support</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	@include('frontend.layouts.newsletter-c')
	
{{-- newaravial modal --}}
@if(Helper::getAllProductFromWishlist())
@foreach(Helper::getAllProductFromWishlist() as $key=>$wishlist)
<div class="modal fade " id="{{$wishlist->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="product-single-container product-single-default product-quick-view mb-0" id="{{$wishlist->id}}" tabindex="-1" role="dialog">
                    <div class="row">
                        <div class="col-md-6 product-single-gallery mb-md-0">
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-sale">
                                        -{{$wishlist->product['discount'] }}%
                                    </div>
                                </div>
                
                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    @php
                                    $photo=explode(',',$wishlist->product['photo'] );
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
                                <h1 class="product-title">{{$wishlist->product['title'] }}</h1>
            
                                @php
                                    $rate=DB::table('product_reviews')->where('product_id',$wishlist->product['id'] )->avg('rate');
                                    $rate_count=DB::table('product_reviews')->where('product_id',$wishlist->product['id'] )->count();
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
                                        $after_discount=($wishlist->product['price'] -($wishlist->product['price'] *$wishlist->product['discount'] )/100);
                                    @endphp
									<del class="old-price">${{number_format($wishlist->product['price'] ,2)}}</del>
									<span class="product-price">${{number_format($after_discount,2)}}</span>
                                </div><!-- End .price-box -->
                
                                <div class="product-desc">
                                    <p>
                                        {!! html_entity_decode($wishlist->product['summary'] ) !!}
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
                                                $sizes=explode(',',$wishlist->product['size'] );
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
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush