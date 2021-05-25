@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
<div class="card-group">
    <div class="card-custom-reg col-md-5" style="min-width:22rem">
        <div class="justify-content-center">
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="card-body text-left">
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
    <div class="card-custom-right order-first order-md-0 col-md">
        <div class="card-body d-flex flex-column align-items-center justify-content-start">
            <h2 class="card-title" style="margin-bottom: -.64rem">Hello There ~</h2> <br>
            <p class="card-text">
                <h3 class="text-center">Rapportooze helps organises interactions with your close ones.</h3> 
                <p class="card-text text-justify">
                    Do you remember to say happy birthday to your niece and nephew? Make time to contact all your friends?
                    Recall to have dinner on a special occasion?? Or to recall the last time you had a get-together with your grandparents?
                </p>
                <h5 class="card-text text-center mt-4">
                    <strong>Rapportooze makes it easy to keep track of all of these info so you can be a better person to your loved ones. SIGN UP NOW !</strong> 
                </h5>
            </p>
        </div>
    </div>
</div>
@endsection
