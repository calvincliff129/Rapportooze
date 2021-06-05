<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('/image/Rappportooze_R_no_background.png')}}" style="width:30px" alt="Rapportooze Logo"> {{ __(' Rapportooze') }}
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            @if ($user->avatar == null)
                                <div>{!! Avatar::create($user->name)->setFontSize(10)->setBorder(0, '#fff', 30)->setDimension(30)->toSvg(); !!}</div>
                            @else
                                <img src="{{ @$url }}" alt="{{ __('Profile Photo') }}">
                            @endif
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('home') }}" class="nav-item dropdown-item">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('User Profile') }}</a>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                        </li> -->
                        @if ($user->hasRole('administrator'))
                            <li class="nav-link">
                                <a href="{{route('manage.dashboard')}}" class="nav-item dropdown-item">{{ __('Administration') }}</a>
                            </li> 
                        @endif
                        <li class="nav-link">
                            <a href="{{route('home.help')}}" target="_blank" class="nav-item dropdown-item">{{ __('Help') }}</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH CONTACT') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
