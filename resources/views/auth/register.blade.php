@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
    <div class="col-md-7 mx-auto">
        <div class="card-custom card-register fc-white">
            <div class="justify-content-center">
                

                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <h2 class="card-title mb-5 text-center">Register</h2>
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-lock-circle"></i>
                                    </div>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                            </div>
                        </div>

                        <div class="form-group my-4 row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">
                                {{ __('REGISTER') }}
                            </button>
                        </div>

                        <div class="fs-small fw-lighter text-center">
                            <a class="link-warning" href="{{ route('login') }}">
                                {{ __('Already have an account?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
    </div>
@endsection
