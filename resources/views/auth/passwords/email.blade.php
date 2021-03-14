@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 500px;">
        <div class="col-md-6">
            <div class="card text-center">
                <h5 class="card-header">{{ __('Forgot password') }}</h5>

                <div class="card-body ctn-custom">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row pt-4 pb-2">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="Input-custom w-100 @error('email') is-invalid @enderror" style="padding-left: 20px;" placeholder="rapportooze@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row pt-4 pb-3">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn-custom">
                                    {{ __('Get Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h5 class="text-center mt-2"><a href="{{ route('login') }}" class="link-warning"><i class="fas fa-angle-left " style="font-size: 14px;" > Back to login</i></a></h5>
        </div>
    </div>
</div>
@endsection
