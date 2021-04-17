@extends('layouts.user')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 400px;">
        <div class="col-md-8">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <div class="card">
                        <div class="card-header">{{ __('Activity') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection