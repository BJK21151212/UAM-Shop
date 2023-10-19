@extends('frontend.layouts.master-c')

@section('title','E-Shop || Register Page')

@section('main-content')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Register Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>Register Account</h1>
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

                        <form action="{{route('register.submit')}}" method="post">
                            @csrf
                            <label for="register-name">
                                Your name
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="name" placeholder="" value="{{old('name')}}" class="form-input form-wide" id="register-name" required />
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <label for="register-email">
                                Username or email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" name="email" placeholder="" value="{{old('email')}}" class="form-input form-wide" id="register-email" required />
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <label for="register-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" name="password" class="form-input form-wide" id="register-password" required value="{{old('password')}}" />
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <label for="confirm-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" name="password_confirmation" class="form-input form-wide" id="confirm-password" required value="{{old('password_confirmation')}}"/>
                            @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="form-footer">
                            </div>
                            <button type="submit" class="btn btn-dark w-50">
                                REGISTER
                            </button>
                            <a href="{{route('login.form')}}" class="btn  w-20">LOGIN</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->
@endsection
