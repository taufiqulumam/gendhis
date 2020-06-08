{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>@yield('title')</title> --}}
    <title>Login | Gendhis Wedding</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body class="login">
    <div class="container login-container">
        <div class="row page-login d-flex justify-content-center">
            <div class="section-left col-6 md-4">
                <h1 class="mb-4">Make your special moments
                    <br>
                    more memorable
                </h1>
                <img src="{{ url('frontend/images/login-images.png') }}" alt="Login Images" class="images d-none d-sm-flex">
            </div>
            <div class="section-right col-4 md-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('home') }}">
                                <img src="{{ url('frontend/images/logo_gendhis.png') }}" alt="Logo Gendhis" class="logo-image col-6 mb-4">
                            </a>
                            <p  class="text-center mt-0" style="font-size: 16px;">
                                Belum punya akun?
                                <a href="{{ route('register') }}">Daftar Sekarang</a>
                            </p>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <div>
                                    <input type="email"
                                        name="email"
                                        id="email"
                                        class="form-control @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}"
                                        required autocomplete="email" autofocus
                                        aria-describedby="emailHelp">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div>
                                    <input type="password"
                                        name="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck">
                                <label for="exampleCheck" class="form-check-label">
                                    Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-sign-in btn-block">
                                Sign In
                            </button>

                            @if (Route::has('password.request'))
                                <p class="text-center mt-4">
                                    <a href="{{ route('password.request') }}">Saya Lupa Password</a>
                                </p>
                            @endif
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>