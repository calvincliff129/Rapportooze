@guest
    <div class="container pt-4 d-flex justify-content-between">
        <a class="navbar-brand text-light" href="{{route('home')}}">Rapportooze</a>
        <div>
            <a href="{{ route('login') }}" class="btn text-light me-md-2" style="text-shadow: 2px 2px 2px #000;">Log in</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light rounded-pill border-3 w-signup-btn">Sign up</a>
        </div>
    </div>
@else
    <nav class="navbar navbar-expand-md nav-custom">
        <div class="container">
            <div class="d-flex flex-grow-1">
                <span class="w-50 d-lg-none d-block"></span>
                <a class="navbar-brand d-none d-lg-inline-block" href="{{route('home')}}">
                    <img src="{{asset('/image/Rappportooze_R_no_background.png')}}" style="width:50px" alt="Rapportooze Logo">
                </a>
                <a class="navbar-brand-two d-lg-none d-inline-block"></a>
            </div>

            <div class="w-50 justify-content-start">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContentCollapse" aria-controls="navbarContentCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-ellipsis-v" style="color: #fffaf0; outline: 0;"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse w-100" id="navbarContentCollapse">
                <ul class="navbar-nav" role="group" aria-label="Basic example">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="btn btn-purple smallmenu w-nav-btn no-right-rad" data-mdb-color="dark">
                            DASHBOARD
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="btn btn-purple smallmenu w-nav-btn no-rad" data-mdb-color="dark">
                            CONTACTS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('reminder')}}" class="btn btn-purple smallmenu w-nav-btn no-left-rad" data-mdb-color="dark">
                            DIARY
                        </a>
                    </li>
                   
                    <!-- Menu for sidebar in smaller devices -->
                    <li class="nav-item dropdown d-sm-block d-md-none">
                        <a class="btn btn-purple dropdown-toggle smallmenu" href="#" id="smallscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ADMIN MENU
                        </a>
                        <div class="dropdown-menu" aria-labelledby="smallscreenmenu">
                            <a class="dropdown-item" href="{{route('manage.dashboard')}}">Dashboard</a>
                            <a class="dropdown-item" href="#">Administration</a>
                        </div>
                    </li>
                    <!-- Smaller devices menu END -->
                </ul>
            </div>

            <div class="nav navbar-nav w-50">
                <div class="justify-content-end ms-auto">
                    <div class="nav-item search-box d-inline">
                        <input type="text" placeholder="Search" class="input-search">
                        <div class="btn-search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div>
                        <li class="dropdown">
                            <a type="button" class="btn btn-danger dropdown-toggle" id="dropdownMenuBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="margin-top: 15px;" aria-labelledby="dropdownMenuBtn">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Notification</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <a href="{{route('manage.dashboard')}}" class="dropdown-item">
                                        <span class="icon">
                                        <i class="fas fa-fw fa-cog"></i>
                                        </span>Manage
                                    </a>
                                </li>
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
                    </div>
                </div>                     
            </div>
        </div>
    </nav>
@endguest
