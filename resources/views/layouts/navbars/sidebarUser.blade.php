<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal text-center">{{ $page ?? __('User') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="fas fa-columns"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li @if ($pageSlug == 'contact') class="active " @endif>
                <a href="{{ route('contact.index') }}">
                    <i class="far fa-user-circle"></i>
                    <p>Contacts</p>
                </a>
            </li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit') }}">
                    <i class="far fa-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
        </ul>
    </div>
</div>