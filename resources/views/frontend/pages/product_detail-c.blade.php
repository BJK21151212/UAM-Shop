@extends('frontend.layouts.master-c')

@section('title','E-SHOP || PRODUCT DETAIL')
@section('main-content')
<main class="main">
	<div class="container">
		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item"><a href="#">Products</a></li>
			</ol>
		</nav>

		<div class="product-single-container product-single-default">
			<div class="cart-message d-none">
				<strong class="single-cart-notice">“{{$product_detail->title}}”</strong>
			</div>

			<div class="row">
				<div class="col-lg-5 col-md-6 product-single-gallery">
					<div class="product-slider-container">
						<div class="label-group">
							<div class="product-label label-hot">HOT</div>

							<div class="product-label label-sale">
								-{{$product_detail->discount}}%
							</div>
						</div>
						@php 
							$photo=explode(',',$product_detail->photo);
							// dd($photo);
						@endphp
						<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
							
							@foreach($photo as $data)
								<div class="product-item">
									<img class="product-single-image" src="{{$data}}" data-zoom-image="{{$data}}" width="468" height="468" alt="product" />
								</div>
							@endforeach
						</div>
						<!-- End .product-single-carousel -->
						<span class="prod-full-screen">
							<i class="icon-plus"></i>
						</span>
					</div>

					<div class="prod-thumbnail owl-dots">
						@foreach($photo as $data)
							<div class="owl-dot">
								<img src="{{$data}}" width="110" height="110" alt="product-thumbnail" />
							</div>
						@endforeach
					</div>
				</div>
				<!-- End .product-single-gallery -->

				<div class="col-lg-7 col-md-6 product-single-details">
					<h1 class="product-title">{{$product_detail->title}}</h1>

					<div class="ratings-container">
						<div class="product-ratings">
							@php
								$rate=ceil($product_detail->getReview->avg('rate'));
								$percentage = ($rate/5)*100;
							@endphp
							<span class="ratings" style="width:{{$percentage}}%"></span>
							<!-- End .ratings -->
							<span class="tooltiptext tooltip-top"></span>
						</div>
						<!-- End .product-ratings -->

						<a href="#" class="rating-link">( {{$product_detail['getReview']->count()}} Reviews )</a>
					</div>
					<!-- End .ratings-container -->

					<hr class="short-divider">

					<div class="price-box">
						@php 
						$after_discount=($product_detail->price-(($product_detail->price*$product_detail->discount)/100));
						@endphp
						<span class="old-price">${{number_format($product_detail->price,2)}}</span>
						<span class="new-price">${{number_format($after_discount,2)}}</span>
					</div>
					<!-- End .price-box -->

					<div class="product-desc">
						<p>
							{!!($product_detail->summary)!!}
						</p>
					</div>
					<!-- End .product-desc -->

					<ul class="single-info-list">

						<li>
							CATEGORY: <strong><a href="{{route('product-cat',$product_detail->cat_info['slug'])}}" class="product-category">{{$product_detail->cat_info['title']}}</a></strong>
						</li>

						<li>
							TAGs: <strong><a href="#" class="product-category">CLOTHES</a></strong>,
							<strong><a href="#" class="product-category">SWEATER</a></strong>
						</li>
					</ul>
					<form action="{{route('single-add-to-cart')}}" method="POST">
						@csrf 
						<div class="product-action">
							<div class="product-single-qty">
								<input type="hidden" name="slug" value="{{$product_detail->slug}}">
								<input name="quant[1]" class="horizontal-quantity form-control" type="text" data-min="1" data-max="1000" value="1" id="quantity">
							</div>
							<!-- End .product-single-qty -->

							<button type="submit" class="btn btn-dark mr-2" title="Add to Cart">Add to
								Cart</a>

							<a href="{{route('cart')}}" class="btn btn-gray view-cart d-none">View cart</a>
						</div>
					</form>
					<!-- End .product-action -->

					<hr class="divider mb-0 mt-0">

					<div class="product-single-share mb-3">
						<label class="sr-only">Share:</label>

						<div class="social-icons mr-2">
							<a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
							<a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
							<a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
							<a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
							<a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
						</div>
						<!-- End .social-icons -->

						<a href="{{route('add-to-wishlist',$product_detail->slug)}}" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
								class="icon-wishlist-2"></i><span>Add to
								Wishlist</span></a>
					</div>
					<!-- End .product single-share -->
				</div>
				<!-- End .product-single-details -->
			</div>
			<!-- End .row -->
		</div>
		<!-- End .product-single-container -->

		<div class="product-single-tabs">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
						Information</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews ({{$product_detail->getReview->count()}})</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
					<div class="product-desc-content">
						<p>{!! ($product_detail->description) !!}</p>
					</div>
					<!-- End .product-desc-content -->
				</div>
				<!-- End .tab-pane -->

				<div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
					<div class="product-size-content">
						<div class="row">
							<div class="col-md-4">
							<img src="{{asset('frontend-c/assets/images/products/single/body-shape.png')}}" alt="body shape" width="217" height="398">
							</div>
							<!-- End .col-md-4 -->

							<div class="col-md-8">
								<table class="table table-size">
									<thead>
										<tr>
											<th>SIZE</th>
											<th>CHEST(in.)</th>
											<th>WAIST(in.)</th>
											<th>HIPS(in.)</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>XS</td>
											<td>34-36</td>
											<td>27-29</td>
											<td>34.5-36.5</td>
										</tr>
										<tr>
											<td>S</td>
											<td>36-38</td>
											<td>29-31</td>
											<td>36.5-38.5</td>
										</tr>
										<tr>
											<td>M</td>
											<td>38-40</td>
											<td>31-33</td>
											<td>38.5-40.5</td>
										</tr>
										<tr>
											<td>L</td>
											<td>40-42</td>
											<td>33-36</td>
											<td>40.5-43.5</td>
										</tr>
										<tr>
											<td>XL</td>
											<td>42-45</td>
											<td>36-40</td>
											<td>43.5-47.5</td>
										</tr>
										<tr>
											<td>XXL</td>
											<td>45-48</td>
											<td>40-44</td>
											<td>47.5-51.5</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- End .row -->
					</div>
					<!-- End .product-size-content -->
				</div>
				<!-- End .tab-pane -->

				<div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
					<table class="table table-striped mt-2">
						<tbody>

							@if($product_detail->size)
								@php 
								$sizes=explode(',',$product_detail->size);
															// dd($sizes);
								@endphp
								<tr>
									<th>Size</th>
									<td>
								@foreach($sizes as $size)
								<a href="#" class="one">{{$size}},</a>
								@endforeach
								<td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
				<!-- End .tab-pane -->

				<div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
					<div class="product-reviews-content">
						<h3 class="reviews-title">{{$product_detail->getReview->count()}} {{$product_detail->title}}</h3>

						<div class="comment-list">
							@foreach($product_detail['getReview'] as $data)
							<div class="comments">
								<figure class="img-thumbnail">
									@if($data->user_info['photo'])
									<img src="{{$data->user_info['photo']}}" alt="{{$data->user_info['photo']}}" width="80" height="80">
									@else 
									<img src="{{asset('backend/img/avatar.png')}}" alt="Profile.jpg" width="80" height="80">
									@endif
								</figure>

								<div class="comment-block">
									<div class="comment-header">
										<div class="comment-arrow"></div>

										<div class="ratings-container float-sm-right">
											<div class="product-ratings">
												@php
													$rate = ($data->rate / 5)*100;
												@endphp
												<span class="ratings" style="width:{{$rate}}%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div>
											<!-- End .product-ratings -->
										</div>

										<span class="comment-by">
											<strong>{{$data->user_info['name']}}</strong> – April 12, 2018
										</span>
									</div>

									<div class="comment-content">
										<p>{{$data->review}}</p>
									</div>
								</div>
							</div>
							@endforeach
						</div>

						<div class="divider"></div>

						<div class="add-product-review">
							<h3 class="review-title">Add a review</h3>
							@auth
							<form class="form" method="post" action="{{route('review.store',$product_detail->slug)}}">
								@csrf
								<div class="rating-form">
									<label for="rating">Your rating <span class="required">*</span></label>
									<span class="rating-stars">
										<input class="star-rating__input" style="display:  none" id="star-rating-1" type="radio"value="1" name="rate"/>
										<a class="star-1" href="#">1</a>
										<input class="star-rating__input" style="display: none" id="star-rating-2" type="radio"value="2" name="rate"/>
										<a class="star-2" href="#">2</a>
										<input class="star-rating__input" style="display: none" id="star-rating-3" type="radio"value="3" name="rate"/>
										<a class="star-3" href="#">3</a>
										<input class="star-rating__input" style="display: none" id="star-rating-4" type="radio"value="4" name="rate"/>
										<a class="star-4" href="#">4</a>
										<input class="star-rating__input" style="display: none" id="star-rating-5" type="radio"value="5" name="rate"/>
										<a class="star-5" href="#">5</a>
									</span>
									{{-- <span class="rating-stars">
										<input class="star-rating__input" style="display:  block" id="star-rating-1" type="radio"value="1" name="rate"/>
										<label class="star-1" href="#">1</label>
										<a class="star-2" href="#">2</a>
										<a class="star-3" href="#">3</a>
										<a class="star-4" href="#">4</a>
										<a class="star-5" href="#">5</a>
									</span> --}}

									<select name="rating" id="rating" required="" style="display: none;">
										<option value="">Rate…</option>
										<option value="5">Perfect</option>
										<option value="4">Good</option>
										<option value="3">Average</option>
										<option value="2">Not that bad</option>
										<option value="1">Very poor</option>
									</select>
								</div>

								<div class="form-group">
									<label>Your review <span class="required">*</span></label>
									<textarea cols="5" rows="6" name="review" class="form-control form-control-sm"></textarea>
								</div>
								<!-- End .form-group -->
									<button type="submit" class="btn btn-primary">Submit</button>
							</form>
							@else
							<p class="text-center p-5">
								You need to <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register.form')}}">Register</a>
							</p>
							@endauth
						</div>
						<!-- End .add-product-review -->
					</div>
					<!-- End .product-reviews-content -->
				</div>
				<!-- End .tab-pane -->
			</div>
			<!-- End .tab-content -->
		</div>
		<!-- End .product-single-tabs -->

		<div class="products-section pt-0">
			<h2 class="section-title">Related Products</h2>

			<div class="products-slider owl-carousel owl-theme dots-top dots-small">
				@foreach($product_detail->rel_prods as $data)
                    @if($data->id !==$product_detail->id)
						<div class="product-default">
							<figure>
								<a href="{{route('product-detail',$data->slug)}}">
									@php 
										$photo=explode(',',$data->photo);
									@endphp
									<img src="{{$photo[0]}}" width="280" height="280" alt="product">
									<img src="{{$photo[1]}}" width="280" height="280" alt="product">
								</a>
								<div class="label-group">
									<div class="product-label label-sale">-{{$data->discount}}%</div>
								</div>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="category.html" class="product-category">Category</a>
								</div>
								<h3 class="product-title">
									<a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										@php
											$rate=ceil($data->getReview->avg('rate'));
											$percentage = ($rate/5)*100;
										@endphp
										<span class="ratings" style="width:{{$rate}}%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->
								<div class="price-box">
									@php 
										$after_discount=($data->price-(($data->discount*$data->price)/100));
									@endphp
									<del class="old-price">${{number_format($data->price,2)}}</del>
									<span class="product-price">${{number_format($after_discount,2)}}</span>
								</div>
								<!-- End .price-box -->
								<div class="product-action">
									<a href="{{route('add-to-wishlist',$data->slug)}}" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
									<a href="{{route('add-to-cart',$data->slug)}}" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>ADD TO CART</span></a>
											<a data-toggle="modal" data-target="#{{$data->id}}" href="#{{$data->id}}" title="Quick View" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
					@endif
				@endforeach
			</div>
			<!-- End .products-slider -->
		</div>
		<!-- End .products-section -->
		<!-- End .row -->
	</div>
	<!-- End .container -->
</main>
<!-- End .main -->

{{-- modal --}}
@if($product_detail->rel_prods)
@foreach($product_detail->rel_prods as $key=>$product)
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
