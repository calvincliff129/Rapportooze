<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top">
    <div class="container-fluid">
        <!-- <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
        </div> -->
        <a class="navbar-brand" href="#">{{ __('RAPPORTOOZE') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-link">
                        {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('register') }}" class="btn btn-round btn-primary btn-simple">
                        {{ __('Register') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
