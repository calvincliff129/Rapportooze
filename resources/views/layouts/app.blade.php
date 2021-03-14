<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rapportooze</title>
    <!-- <title>{{ config('app.name', 'Rapportooze') }}</title> -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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
            @guest
                <div class="container pt-4 d-flex justify-content-between">
                    <a class="navbar-brand text-light" href="{{route('home')}}">Rapportooze</a>
                    <div>
                        <a href="{{ route('login') }}" class="btn text-light me-md-2" style="text-shadow: 2px 2px 2px #000;">Log in</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light rounded-pill border-3 w-signup-btn">Sign up</a>
                    </div>
                </div>
            @else
                <nav class="navbar nav navbar-expand-md nav-custom bg-faded justify-content-center">
                    <div class="container">
                        <a class="navbar-brand d-flex w-50 me-auto" href="{{route('home')}}">
                            <img src="{{asset('image/Rapportooze_Logo.png')}}" style="width:100px" alt="Rapportooze Logo" />
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContentCollapse" aria-controls="navbarContentCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="navbar-collapse collapse w-100" id="navbarContentCollapse">
                            <ul class="navbar-nav w-100 justify-content-center">
                                <li class="nav-item active">
                                    <a class="nav-link" aria-current="page" href="#">DASHBOARD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">CONTACTS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">DIARY</a>
                                </li>
                            </ul>  

                            <div class="nav navbar-nav ms-auto w-100 justify-content-end">
                                @guest
                                    <a href="#" class="btn text-light">Log in</a>
                                    <a href="#" class="btn text-light">Sign up</a>
                                @else
                                    <form action="" class="input-group inputLabel w-20">
                                        <input type="text" class="form-control" placeholder="Contacts" id="form-label">    
                                        <!-- <label class="form-label" for="form1">Contact</label> -->
                                        <button class="btn btn-dark" type="submit">SEARCH</button>
                                    </form>
                               
                                    <li class="nav-item dropdown ms-5">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Hey
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li><a class="dropdown-item" href="#">Notification</a></li>
                                            <li><a class="dropdown-item" href="#">Settings</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </div>
                        </div>
                    </div>
                </nav>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
