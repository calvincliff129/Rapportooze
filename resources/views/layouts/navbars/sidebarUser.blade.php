<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal text-center">{{ $page ?? __('User') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
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
                        <li @if ($pageSlug == 'contact') class="active " @endif>
                            <a href="{{ route('contact.index') }}">
                                <i class="far fa-user-circle"></i>
                                <p>{{ _('Contact') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'reminder') class="active " @endif>
                            <a href="{{ route('reminder.index') }}">
                                <i class="far fa-clock"></i>
                                <p>{{ _('Reminder') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'activity') class="active " @endif>
                            <a href="{{ route('activity.index') }}">
                                <i class="far fa-calendar-check"></i>
                                <p>{{ _('Activity') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'timeline') class="active " @endif>
                            <a href="{{ route('timeline.index') }}">
                                <i class="fas fa-heartbeat"></i>
                                <p>{{ _('Timeline') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit') }}">
                    <i class="far fa-user"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>