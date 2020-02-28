@extends('layouts.auth')

@section('title', __('Sign In'))

@section('content')
<div class="container-tight py-6">
    <form class="card card-md needs-validation" novalidate method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card-body">
            <h2 class="mb-5 text-center">{{ __('Login to your account') }}</h2>
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
            <div class="mb-2">
                <label class="form-label">
                    {{ __('Password') }}
                    <span class="form-label-description">
                        <a tabindex="-1" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                    </span>
                </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                <div class="invalid-feedback" role="alert">
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @else
                        <strong>{{ __('The password field is required.') }}</strong>
                    @endif
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Sign In') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
