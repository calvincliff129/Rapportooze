<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rapportooze') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9d3ccc59e0.js" crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Cover Image -->
        <div class="banner-image w-100 vh-100">
            @if (Auth::guest())
                <div class="container pt-4 d-flex justify-content-between">
                    <a class="navbar-brand text-light" href="{{route('home')}}">Rapportooze</a>
                    <div>
                        <a href="#" class="btn text-light me-md-2" style="text-shadow: 2px 2px 2px #000;">Log in</a>
                        <a href="#" class="btn btn-outline-light rounded-pill border-3 w-10">Sign up</a>
                    </div>
                </div>
            @else
                <nav class="navbar nav navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset('image/Rapportooze_Logo.png')}}" style="width:100px" alt="Rapportooze Logo" />
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContentCollapse" aria-controls="navbarContentCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarContentCollapse">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">DASHBOARD</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">CONTACTS</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">DIARY</a>
                                </li>
                            </ul>  
                        </div>

                        <form action="" class="input-group inputLabel w-20">
                            <input type="text" class="form-control" placeholder="Contacts" id="form-label">    
                            <!-- <label class="form-label" for="form1">Contact</label> -->
                            <button class="btn btn-dark" type="submit">SEARCH</button>
                        </form>

                        <div class="nav-right">
                            @if (Auth::guest())
                                <a href="#" class="btn text-light">Log in</a>
                                <a href="#" class="btn text-light">Sign up</a>
                            @else
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Hey You
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Notification</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Logout</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>
            @endif

            @yield('content')

        </div>
    </div>

</body>
</html>
