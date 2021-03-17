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
        <div class="container-fluid">
            <a class="navbar-brand d-flex me-auto" href="{{route('home')}}">
                <img src="{{asset('/image/Rappportooze_Logo.png')}}" style="width:50px" alt="Rapportooze Logo" />
            </a><div class="w-50"></div>
            
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
                    <form action="" class="input-group inputLabel w-20">
                        <input type="text" class="form-control" placeholder="Contacts" id="form-label">    
                        <!-- <label class="form-label" for="form1">Contact</label> -->
                        <button class="btn btn-dark" type="submit">SEARCH</button>
                    </form>
                
                    <li class="nav-item dropdown ms-5">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
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
                </div>
            </div>
        </div>
    </nav>
@endguest
