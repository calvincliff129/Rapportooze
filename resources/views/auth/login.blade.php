@extends('layouts.app', ['class' => 'login-page', 'page' => __('Login Page'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-4 col-md-6 ml-auto mx-auto">
        <div class="card-custom card-login fc-white">
            <div class="justify-content-center">

                <form class="form" method="post" action="{{ route('login') }}">
                    @csrf

                    <div class="card-body">
                        <h2 class="card-title mb-5 text-center">{{ __('Log in to your account') }}</h2>
                        <!-- <p class="mb-4">Login as admin with <strong>calvin@gmail.com</strong> and password <strong>-A_Ls5j5ZMe46Nd</strong></p> -->
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" placeholder="{{ __('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                    
                    
                        <div class="form-group my-4 row justify-content-center">
                            <button type="submit" href="" class="btn btn-primary btn-round">{{ __('LOG IN') }}</button>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a href="{{ route('password.request') }}" class="link footer-link">{{ __('Forgot password?') }}</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="{{ route('register') }}" class="link footer-link">{{ __('Sign up if you\'re new') }}</a>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
