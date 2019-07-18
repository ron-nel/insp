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
                                    <div class="card-header cardHeader">{{ __('Register') }}</div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="my-3 row">
                                                <div class="col-md-12">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name here.">

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="my-3 row">
                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email here.">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="my-3 row">
                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password here.">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="my-3 row">
                                                <div class="col-md-12">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                                </div>
                                            </div>

                                            <div class="my-3 row mb-0">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-insp">
                                                        {{ __('Register') }}
                                                    </button>
                                                    <a class="btn btnLink" href="{{ route('login') }}">
                                                        {{ __('Login instead?') }}
                                                    </a>
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

