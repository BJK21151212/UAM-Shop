@extends('frontend.layouts.master-c')
@section('title','Cart Page')
@section('main-content')

<main class="main">
	<div class="container">
		<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
			<li class="active">
				<a href="{{route('cart')}}">Shopping Cart</a>
			</li>
			<li>
				<a href="checkout.html">Checkout</a>
			</li>
			<li class="disabled">
				<a href="cart.html">Order Complete</a>
			</li>
		</ul>

		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table-container">
					<table class="table table-cart">
						<thead>
							<tr>
								<th class="thumbnail-col"></th>
								<th class="product-col">Product</th>
								<th class="price-col">Price</th>
								<th class="qty-col">Quantity</th>
								<th class="text-right">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								@if(Helper::getAllProductFromCart())
									@foreach(Helper::getAllProductFromCart() as $key=>$cart)
										<tr class="product-row">
											@php
											$photo=explode(',',$cart->product['photo']);
											@endphp
											<td>
												<figure class="product-image-container">
													<a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank" class="product-image">
														<img src="{{$photo[0]}}" alt="product">
													</a>

													<a href="{{route('cart-delete',$cart->id)}}" class="btn-remove icon-cancel" title="Remove Product"></a>
												</figure>
											</td>
											<td class="product-col">
												<h5 class="product-title">
													<a href="{{route('product-detail',$cart->product['slug'])}}" target="_blank">{{$cart->product['title']}}</a>
												</h5>
											</td>
											<td>${{number_format($cart['price'],2)}}</td>
											<td>
												<div class="product-single-qty">
													<input class="horizontal-quantity form-control" name="quant[{{$key}}]"  type="text" data-min="1" data-max="100" value="{{$cart->quantity}}">
													<input type="hidden" name="qty_id[]" value="{{$cart->id}}">
												</div><!-- End .product-single-qty -->
											</td>
											<td class="text-right"><span class="subtotal-price">${{$cart['amount']}}</span></td>
										</tr>	
									@endforeach
									<track>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td class="float-right">
											<button class="btn float-right" type="submit">Update</button>
										</td>
									</track>
									@else
										<tr>
											<td class="text-center">
												There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>

											</td>
										</tr>
								@endif
							</form>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" class="clearfix">
									<div class="float-left">
										<div class="cart-discount">
											<form action="{{route('coupon-store')}}" method="POST">
												@csrf
												<div class="input-group">
													<input type="text" name="code" class="form-control form-control-sm"
														placeholder="Coupon Code" required>
													<div class="input-group-append">
														<button class="btn btn-sm" type="submit">Apply
															Coupon</button>
													</div>
												</div><!-- End .input-group -->
											</form>
										</div>
									</div><!-- End .float-left -->

									
								</td>
							</tr>
						</tfoot>
					</table>
				</div><!-- End .cart-table-container -->
			</div><!-- End .col-lg-8 -->

			<div class="col-lg-4">
				<div class="cart-summary">
					<h3>CART TOTALS</h3>

					<table class="table table-totals">
						<tbody>
							<tr>
								<td>Subtotal</td>
								<td class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">${{number_format(Helper::totalCartPrice(),2)}}</td>
							</tr>
							@if(session()->has('coupon'))
							<tr>
								<td>You saved</td>
								<td class="coupon_price" data-price="{{Session::get('coupon')['value']}}">${{number_format(Session::get('coupon')['value'],2)}}</td>
							</tr>
							@endif
							<tr>
								<td colspan="2" class="text-left">
									<h4>Shipping</h4>

									<div class="form-group form-group-custom-control">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" name="radio"
												checked>
											<label class="custom-control-label">Local pickup</label>
										</div><!-- End .custom-checkbox -->
									</div><!-- End .form-group -->

									<div class="form-group form-group-custom-control mb-0">
										<div class="custom-control custom-radio mb-0">
											<input type="radio" name="radio" class="custom-control-input">
											<label class="custom-control-label">Flat rate</label>
										</div><!-- End .custom-checkbox -->
									</div><!-- End .form-group -->

									<form action="#">
										<div class="form-group form-group-sm">
											<label>Shipping to <strong>NY.</strong></label>
											<div class="select-custom">
												<select class="form-control form-control-sm">
													<option value="USA">United States (US)</option>
													<option value="Turkey">Turkey</option>
													<option value="China">China</option>
													<option value="Germany">Germany</option>
												</select>
											</div><!-- End .select-custom -->
										</div><!-- End .form-group -->

										<div class="form-group form-group-sm">
											<div class="select-custom">
												<select class="form-control form-control-sm">
													<option value="NY">New York</option>
													<option value="CA">California</option>
													<option value="TX">Texas</option>
												</select>
											</div><!-- End .select-custom -->
										</div><!-- End .form-group -->

										<div class="form-group form-group-sm">
											<input type="text" class="form-control form-control-sm"
												placeholder="Town / City">
										</div><!-- End .form-group -->

										<div class="form-group form-group-sm">
											<input type="text" class="form-control form-control-sm"
												placeholder="ZIP">
										</div><!-- End .form-group -->

										<button type="submit" class="btn btn-shop btn-update-total">
											Update Totals
										</button>
									</form>
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								@php
									$total_amount=Helper::totalCartPrice();
									if(session()->has('coupon')){
									$total_amount=$total_amount-Session::get('coupon')['value'];
										}
								@endphp
								@if(session()->has('coupon'))
								<td>Total</td>
								<td>${{number_format($total_amount,2)}}</td>
								@else
								<td>Total</td>
								<td>${{number_format($total_amount,2)}}</td>
								@endif
							</tr>
						</tfoot>
					</table>

					<div class="checkout-methods">
						<a href="{{route('checkout')}}" class="btn btn-block btn-dark">Proceed to Checkout
							<i class="fa fa-arrow-right"></i></a>
						<a href="{{route('product-grids')}}" class="btn btn-block btn-dark">Continue Shopping
							<i class="fa fa-arrow-left"></i></a>
					</div>
				</div><!-- End .cart-summary -->
			</div><!-- End .col-lg-4 -->
		</div><!-- End .row -->
	</div><!-- End .container -->

	<div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->

@endsection
@push('styles')
@endpush
@push('scripts')
	{{-- <script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script> --}}
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') );
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush
