@guest
    <div class="container pt-4 d-flex justify-content-between">
        <a class="navbar-brand text-light" href="{{route('home')}}">Rapportooze</a>
        <div>
            <a href="{{ route('login') }}" class="btn text-light me-md-2" style="text-shadow: 2px 2px 2px #000;">Log in</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light rounded-pill border-3 w-signup-btn">Sign up</a>
        </div>
    </div>
@else
    <nav class="navbar nav navbar-expand-lg nav-custom bg-faded">
        <div class="container">
            <div class="d-flex flex-grow-1">
                <span class="w-50 d-lg-none d-block"></span>
                <a class="navbar-brand d-none d-lg-inline-block" href="{{route('home')}}">
                    <img src="{{asset('/image/Rappportooze_R_no_background.png')}}" style="width:50px" alt="Rapportooze Logo" />
                </a>
                <a class="navbar-brand-two mx-auto d-lg-none d-inline-block"></a>
            </div>

            <div class="w-50 text-right">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContentCollapse" aria-controls="navbarContentCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-ellipsis-v" style="color: #fffaf0; outline: 0;"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse w-100" id="navbarContentCollapse">
                <div class="navbar-nav justify-content-center btn-group btn-group-md" role="group" aria-label="Basic example">
                    <a href="{{route('home')}}" class="btn btn-purple active w-nav-btn" data-mdb-color="dark">
                        DASHBOARD
                    </a>
                    <a class="btn btn-purple w-nav-btn" data-mdb-color="dark">
                        CONTACTS
                    </a>
                    <a class="btn btn-purple w-nav-btn" data-mdb-color="dark">
                        DIARY
                    </a>
                </div>
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
                            <a type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
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
