@extends('frontend.layouts.master-c')

@section('title','E-Shop || Login Page')

@section('main-content')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading mb-1">
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
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
@endsection
