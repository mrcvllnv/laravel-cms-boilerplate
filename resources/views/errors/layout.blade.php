<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased border-top-wide border-primary d-flex flex-column">
        <div class="flex-fill d-flex align-items-center justify-content-center">
            <div class="container-tight py-6">
                <div class="empty">
                    <div class="empty-icon">
                        <div class="display-4">@yield('code')</div>
                    </div>
                    <p class="empty-title h3">{{ __('Oops… You just found an error page') }}</p>
                    <p class="empty-subtitle text-muted">
                        @yield('message')
                    </p>
                    <div class="empty-action">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            {{ __('Take me home') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
