@extends('frontend.layouts.master')
@section('title','Wishlist Page')
@section('main-content')
<main class="main">
	<div class="page-header">
		<div class="container d-flex flex-column align-items-center">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
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
			<h2 class="p-2">My wishlist on Porto Shop 4</h2>
		</div>
		<div class="wishlist-table-container">
			<table class="table table-wishlist mb-0">
				<thead>
					<tr>
						<th class="thumbnail-col"></th>
						<th class="product-col">Product</th>
						<th class="price-col">Price</th>
						<th class="status-col">Stock Status</th>
						<th class="action-col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr class="product-row">
						<td>
							<figure class="product-image-container">
								<a href="product.html" class="product-image">
									<img src="assets/images/products/product-4.jpg" alt="product">
								</a>

								<a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
							</figure>
						</td>
						<td>
							<h5 class="product-title">
								<a href="product.html">Men Watch</a>
							</h5>
						</td>
						<td class="price-box">$17.90</td>
						<td>
							<span class="stock-status">In stock</span>
						</td>
						<td class="action">
							<a href="ajax/product-quick-view.html" class="btn btn-quickview mt-1 mt-md-0"
								title="Quick View">Quick
								View</a>
							<button class="btn btn-dark btn-add-cart product-type-simple btn-shop">
								ADD TO CART
							</button>
						</td>
					</tr>

					<tr class="product-row">
						<td>
							<figure class="product-image-container">
								<a href="product.html" class="product-image">
									<img src="assets/images/products/product-5.jpg" alt="product">
								</a>

								<a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
							</figure>
						</td>
						<td>
							<h5 class="product-title">
								<a href="product.html">Men Cap</a>
							</h5>
						</td>
						<td class="price-box">$17.90</td>
						<td>
							<span class="stock-status">In stock</span>
						</td>
						<td class="action">
							<a href="ajax/product-quick-view.html" class="btn btn-quickview mt-1 mt-md-0"
								title="Quick View">Quick
								View</a>
							<a href="product.html" class="btn btn-dark btn-add-cart btn-shop">
								SELECT OPTION
							</a>
						</td>
					</tr>

					<tr class="product-row">
						<td>
							<figure class="product-image-container">
								<a href="product.html" class="product-image">
									<img src="assets/images/products/product-6.jpg" alt="product">
								</a>

								<a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
							</figure>
						</td>
						<td>
							<h5 class="product-title">
								<a href="product.html">Men Black Gentle Belt</a>
							</h5>
						</td>
						<td class="price-box">$17.90</td>
						<td>
							<span class="stock-status">In stock</span>
						</td>
						<td class="action">
							<a href="ajax/product-quick-view.html" class="btn btn-quickview mt-1 mt-md-0"
								title="Quick View">Quick
								View</a>
							<a href="product.html" class="btn btn-dark btn-add-cart btn-shop">
								SELECT OPTION
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div><!-- End .cart-table-container -->
	</div><!-- End .container -->
</main><!-- End .main -->
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	@include('frontend.layouts.newsletter')
	
	
	
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
	
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush