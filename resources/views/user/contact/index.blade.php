@extends('layouts.user', ['page' => __('Contact'), 'pageSlug' => 'contact'])

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 400px;">
        <div class="col-md-8">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <div class="card">
                            <div class="card-header">{{ __('Contact') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <tr><th scope="col"></th>
                                        <th scope="col">Contact Name</th>
                                        <th scope="col">Info</th>
                                    </tr></thead>
                                    <tbody>
                                        <tr>
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Country:</strong>
                                        <select name="country" id="country" class="form-control mb-1">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</div>
@endsection