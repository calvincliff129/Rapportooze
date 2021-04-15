<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal text-center">{{ $page ?? __('User') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
                    <i class="fas fa-columns"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="far fa-address-book" ></i>
                    <span class="nav-link-text" >{{ __('Manage Contacts') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li >
                            <a href="#">
                                <i class="far fa-user-circle"></i>
                                <p>{{ _('Contact') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-clock"></i>
                                <p>{{ _('Reminder') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-calendar-check"></i>
                                <p>{{ _('Activity') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-heartbeat"></i>
                                <p>{{ _('Timeline') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}">
                    <i class="far fa-user"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>