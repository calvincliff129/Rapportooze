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
            <li @if ($pageSlug == 'contact') class="active " @endif>
                <a href="{{ route('contact.index') }}">
                    <i class="far fa-user-circle"></i>
                    <p>{{ _('Contacts') }}</p>
                </a>
            </li>
            <!-- <li>
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
                                <p>{{ _('Contacts') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'activity') class="active " @endif>
                            <a href="#">
                                <i class="far fa-clock"></i>
                                <p>{{ _('Activities') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'gift') class="active " @endif>
                            <a href="#">
                                <i class="fas fa-gift"></i>
                                <p>{{ _('Gifts') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'debt') class="active " @endif>
                            <a href="#">
                                <i class="far fa-money-bill-alt"></i>
                                <p>{{ _('Debts') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit') }}">
                    <i class="far fa-user"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>