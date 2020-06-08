{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
    <title>Register | Gendhis Wedding</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body class="register">
    <div class="container register-container">
        <div class="row page-register d-flex justify-content-center">
            <div class="section-left col-6 md-4">
                <h1 class="mb-4">
                    Join and Plan Your <br> Wedding <br> with Us
                </h1>
            </div>
            <div class="section-right col-4 md-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 style="font-weight: 600; font-size: 25px;">Register Now</h2>
                            <hr>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <div>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                            required autocomplete="name" autofocus class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            required autocomplete="email" class="form-control @error('email') is-invalid @enderror">

                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <div>
                                    <input type="number" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                            required autocomplete="phone_number" class="form-control @error('phone_number') is-invalid @enderror">

                                        @error('phone_number')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div>
                                    <input type="password" id="password" name="password" required autocomplete="new-password"
                                            class="form-control @error('password') is-invalid @enderror">

                                        @error('password')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <div>
                                    <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password"
                                            class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-sign-in btn-block">
                                Register
                            </button>
                            <p class="text-center mt-4" style="font-size: 16px;">
                                Sudah Punya Akun? 
                                <a href="{{ route('login') }}">Masuk</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
