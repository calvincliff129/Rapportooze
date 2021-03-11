@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-4 col-xs-12 box-login">
            <h1 class="mb-5">Log in to your account</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="input-group flex-nowrap mb-4">
                    <span class="input-group-text"><i class="fa fa-envelope text-secondary"></i></span>
                    <input id="email" type="email" class="form-control py-2 @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text"><i class="fa fa-key text-secondary"></i></span>
                    <input id="password" type="password" class="form-control py-2 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row mb-4">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-dark mx-auto col-5 mb-5 py-custom">
                        {{ __('LOG IN') }}
                    </button>
                </div>

                <div class="fs-small fw-lighter text-center">
                    @if (Route::has('password.request'))
                        <a class="link-warning" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <a class="link-warning ms-custom" href="#">
                        {{ __('Sign up if you\'re new') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
