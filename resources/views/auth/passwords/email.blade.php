@extends('layouts.app', ['class' => 'login-page', 'page' => __('Reset password'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-5 col-md-7 ml-auto mx-auto">
        <div class="card-custom card-login fc-white">
            <div class="justify-content-center">

                <form class="form" method="post" action="{{ route('password.email') }}">
                    @csrf

                    <div class="card-body">
                        <h2 class="card-title mb-4 text-center">{{ __('Reset password') }}</h2>
                            @include('alerts.success')

                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-email-85"></i>
                                    </div>
                                </div>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        <div class="form-group row mt-4 justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>        
            </div>      
        </div>
        <div class="text-center mt-4">
            <h6>
                <a href="{{ route('login') }}" class="footer-link"><i class="fas fa-angle-left chevron-left"></i>{{ __(' Go back') }}</a>
            </h6>
        </div>
    </div>
@endsection
