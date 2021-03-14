@extends('layouts.app')

@section('content')
<div class="container-custom">
    <div class="card-custom">
        <div class="ctn-custom">
            <h2 class="fc-white mb-5 text-center">Log in to your account</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group mb-4">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="Input-custom w-custom @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group py-custom mb-2">
                    <i class="fas fa-key"></i>
                    <input id="password" type="password" class="Input-custom w-custom @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <div class="col-sm-8 ms-auto">
                        <div class="checkbox small">
                            <label class="form-check-label fc-white" for="remember">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5 row justify-content-center">
                    <button type="submit" class="btn-custom mx-auto py-custom">
                        {{ __('LOG IN') }}
                    </button>
                </div>

                <div class="fs-small fw-lighter text-center">
                    @if (Route::has('password.request'))
                        <a class="link-warning" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <a class="link-warning ms-custom" href="{{ route('register') }}">
                        {{ __('Sign up if you\'re new') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
