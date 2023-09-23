@extends('frontend.layouts.master-c')

@section('main-content')
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="demo4.html"><i class="icon-home"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					Contact Us
				</li>
			</ol>
		</div>
	</nav>

	<div id="map"></div>

	<div class="container contact-us-container">
	@php
		$settings=DB::table('settings')->get();
	@endphp
		<div class="contact-info">

			<div class="row">
				<div class="col-12">
					<h2 class="ls-n-25 m-b-1">
						Contact Info
					</h2>

					<p>
						
					</p>
				</div>

				<div class="col-sm-6 col-lg-3">
					<div class="feature-box text-center">
						<i class="sicon-location-pin"></i>
						<div class="feature-box-content">
							<h3>Address</h3>
							<h5>@foreach($settings as $data) {{$data->address}} @endforeach</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="feature-box text-center">
						<i class="fa fa-mobile-alt"></i>
						<div class="feature-box-content">
							<h3>Phone Number</h3>
							<h5>@foreach($settings as $data) {{$data->phone}} @endforeach</h5>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="feature-box text-center">
						<i class="far fa-envelope"></i>
						<div class="feature-box-content">
							<h3>E-mail Address</h3>
							<h5><a href="https://portotheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="12627d60667d52627d60667d667a777f773c717d7f">@foreach($settings as $data) {{$data->email}} @endforeach</a></h5>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="feature-box text-center">
						<i class="far fa-calendar-alt"></i>
						<div class="feature-box-content">
							<h3>Working Days/Hours</h3>
							<h5>Mon - Sun / 9:00AM - 8:00PM</h5>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<h2 class="mt-6 mb-2">Send Us a Message</h2>

				<form class="mb-0" action="{{route('contact.store')}}" method="post" id="contactForm" novalidate="novalidate">
					@csrf
					<div class="form-group">
						<label class="mb-1" for="contact-name">Your Name
							<span class="required">*</span></label>
						<input type="text" class="form-control" id="name" name="contact-name"
							required placeholder="Enter your name"/>
					</div>

					<div class="form-group">
						<label class="mb-1" for="contact-name">Your Subjects
							<span class="required">*</span></label>
						<input type="text" class="form-control" id="subject" name="contact-name"
							required placeholder="Enter Subject"/>
					</div>

					<div class="form-group">
						<label class="mb-1" for="contact-email">Your E-mail
							<span class="required">*</span></label>
						<input type="email" class="form-control" id="email" name="contact-email"
							required placeholder="Enter email address"/>
					</div>

					<div class="form-group">
						<label class="mb-1" for="contact-email">Your Phone
							<span class="required">*</span></label>
						<input type="number" class="form-control" id="phone" name="phone"
							required placeholder="Enter your phone"/>
					</div>

					<div class="form-group">
						<label class="mb-1" for="contact-message">Your Message
							<span class="required">*</span></label>
						<textarea cols="30" rows="1" id="contact-message" class="form-control"
							name="contact-message" required></textarea>
					</div>
					<div class="form-footer mb-0">
						<button type="submit" class="btn btn-dark font-weight-normal">
							Send Message
						</button>
					</div>
				</form>
			</div>

			<div class="col-lg-6">
				<h2 class="mt-6 mb-1">Frequently Asked Questions</h2>
				<div id="accordion">
					<div class="card card-accordion">
						<a class="card-header" href="#" data-toggle="collapse" data-target="#collapseOne"
							aria-expanded="true" aria-controls="collapseOne">
							Curabitur eget leo at velit imperdiet viaculis
							vitaes?
						</a>

						<div id="collapseOne" class="collapse show" data-parent="#accordion">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>

					<div class="card card-accordion">
						<a class="card-header collapsed" href="#" data-toggle="collapse"
							data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
							Curabitur eget leo at velit imperdiet vague
							iaculis vitaes?
						</a>

						<div id="collapseTwo" class="collapse" data-parent="#accordion">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>

					<div class="card card-accordion">
						<a class="card-header collapsed" href="#" data-toggle="collapse"
							data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
							Curabitur eget leo at velit imperdiet viaculis
							vitaes?
						</a>

						<div id="collapseThree" class="collapse" data-parent="#accordion">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>

					<div class="card card-accordion">
						<a class="card-header collapsed" href="#" data-toggle="collapse"
							data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
							Curabitur eget leo at velit imperdiet vague
							iaculis vitaes?
						</a>

						<div id="collapseFour" class="collapse" data-parent="#accordion">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>

					<div class="card card-accordion">
						<a class="card-header collapsed" href="#" data-toggle="collapse"
							data-target="#collapseFive" aria-expanded="true" aria-controls="collapseThree">
							Curabitur eget leo at velit imperdiet varius
							iaculis vitaes?
						</a>

						<div id="collapseFive" class="collapse" data-parent="#accordion">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mb-8"></div>
</main>
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<!-- Google Map-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
<script src="{{ asset('frontend-c/assets/js/map.js') }}"></script>
<script>(function(){var js = "window['__CF$cv$params']={r:'80166f3e7d5c7480',t:'MTY5MzgzMjYyNy4wNjIwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/3e377faf/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>

<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush