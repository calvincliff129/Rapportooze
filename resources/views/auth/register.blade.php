@extends('layouts.app')

@section('content')
<div class="container-custom">
    <div class="card-custom">
        <div class="row justify-content-center">
            <div class="ctn-custom">
                <h2 class="fc-white mb-5 text-center">Register</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <i class="fas fa-user"></i>
                        <input id="name" type="text" class="Input-custom w-custom @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" class="Input-custom w-custom @error('email') is-invalid @enderror" placeholder="Email address" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-sm mb-5 me-4">
                        <i class="fas fa-key"></i>
                        <input id="password" type="password" class="Input-custom w-10 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <i class="fas fa-lock"></i>
                        <input id="password-confirm" type="password" class="Input-custom w-10" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group mb-4 row justify-content-center">
                        <button type="submit" class="btn-custom mx-auto py-custom">
                            {{ __('REGISTER') }}
                        </button>
                    </div>

                    <div class="fs-small fw-lighter text-center">
                        <a class="link-warning" href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>
                    </div>
                </form>
            </div> 
        </div> 
    </div>
</div>
@endsection
