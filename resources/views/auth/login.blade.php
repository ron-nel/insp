@extends('templates.template')

@section("title", "Home")

@section('content')
<div class="login-bg">
    <div class="login-content">
        <div class="collection-container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="login-container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-10 offset-sm-1">
                                <h3>Help is just a click away!</h3>
                                <p>Access our list of professional help.</p>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-10 offset-sm-1">
                                <div class="card border-insp bg-transparent">
                                    <div class="card-header cardHeader">{{ __('Login') }}</div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email here.">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password here.">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-3">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-insp">
                                                        {{ __('Login') }}
                                                    </button>

                                                    @if (Route::has('password.request'))
                                                    <a class="btn btnLink" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    <a class="btn btnLink" href="{{ route('register') }}">
                                                        {{ __('Not registered yet?') }}
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
