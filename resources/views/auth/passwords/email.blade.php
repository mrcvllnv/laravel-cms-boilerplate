@extends('layouts.auth')

@section('title', __('Forgot Password'))

@section('content')
<div class="container-tight py-6">
    <form class="card card-md needs-validation" novalidate method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="card-body">
            <h2 class="mb-5 text-center">{{ __('Forgot password') }}</h2>
            @if (session('status'))
                <div class="alert alert-default alert-bold" role="alert">
                    <div class="alert-text">{{ __('Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder.') }}</div>
                </div>
                <div class="text-center text-muted">
                    <a href="{{ route('login') }}">{{ __('Take me back') }}</a> {{ __('to the sign in screen.') }}
                </div>
            @else
                <p class="text-muted">{{ __('Enter your email address and we will send you a link to reset your password.') }}</p>
                <div class="mb-3">
                    <label class="form-label">{{ __('Email address') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" required autofocus autocomplete="off">
                    <div class="invalid-feedback" role="alert">
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $error)
                                <strong>{{ $error }}</strong>
                            @endforeach
                        @else
                            <strong>{{ __('The email field is required.') }}</strong>
                        @endif
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                </div>
            @endif
        </div>
    </form>
    @if (! session('status'))
    <div class="text-center text-muted">
        {{ __('Forget it,') }} <a href="{{ route('login') }}">{{ __('take me back') }}</a> {{ __('to the sign in screen.') }}
    </div>
    @endif
</div>
@endsection
