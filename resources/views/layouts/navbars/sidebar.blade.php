<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal text-center">{{ $page ?? __('ADMINISTRATION') }}</a>
        </div>
        <ul class="nav">
            <!-- <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li> -->
            <li @if ($pageSlug == 'manageUsers') class="active " @endif>
                <a href="{{ route('users.index')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Manage Users') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fa fa-sitemap fa-fw me-3" ></i>
                    <span class="nav-link-text" >{{ __('Access Control') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'roles') class="active " @endif>
                            <a href="{{route('roles.index')}}">
                                <i class="fas fa-tag"></i>
                                <p>{{ __('Roles') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'permissions') class="active " @endif>
                            <a href="{{route('permissions.index')}}">
                                <i class="fas fa-eye-slash"></i>
                                <p>{{ __('Permissions') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
