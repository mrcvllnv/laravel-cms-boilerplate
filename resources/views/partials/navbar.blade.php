<nav class="navbar navbar-light navbar-secondary navbar-expand" id="navbar-secondary">
    <div class="container">
        <a href="{{ route('logout') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-vertical">
            <img src="{{ asset('/assets/media/logos/logo.svg') }}" alt="Tabler" class="navbar-brand-logo navbar-brand-logo-large">
            <img src="{{ asset('/assets/media/logos/logo-small.svg') }}" alt="Tabler" class="navbar-brand-logo navbar-brand-logo-small">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown pl-2">
                <a href="#" class="nav-link d-flex lh-1 text-inherit p-0 text-left" data-toggle="dropdown">
                    <span class="avatar bg-blue-lt">{{ auth()->user()->initials }}</span>
                    <div class="d-none d-lg-block pl-2">
                        <div>{{ auth()->user()->full_name }}</div>
                        <div class="mt-1 small text-muted">{{ __('Administrator') }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                        {{ __('Account Settings') }}
                    </a>
                    {{-- <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>