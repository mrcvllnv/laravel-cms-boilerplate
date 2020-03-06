<nav class="navbar navbar-expand-lg navbar-primary navbar-vertical navbar-dark" id="navbar-primary">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal">
            <img src="{{ asset('/assets/media/logos/logo.svg') }}" alt="Tabler" class="navbar-brand-logo navbar-brand-logo-large">
            <img src="{{ asset('/assets/media/logos/logo-small.svg') }}" alt="Tabler" class="navbar-brand-logo navbar-brand-logo-small">
        </a>
        <div class="navbar-collapse collapse">
            <h6 class="navbar-heading">{{ __('Navigation') }}</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) === NULL ? 'active' : '' }}" href="{{ route('dashboard') }}" >
                        <span class="nav-link-icon mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </span>
                        <span class="nav-link-title">{{ __('Dashboard') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>