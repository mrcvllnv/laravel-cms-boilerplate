@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content')
<div class="container-tight py-6">
    <form class="card card-md needs-validation" novalidate method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" class="form-control" name="email" value="{{ $email }}">
        <div class="card-body">
            <h2 class="mb-5 text-center">{{ __('Reset Password') }}</h2>
            @error('email')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <div class="mb-3">
                <label class="form-label">{{ __('New Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autofocus required>
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
            <div class="mb-2">
                <label class="form-label">{{ __('Password Confirmation') }}</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Password" required>
                <div class="invalid-feedback" role="alert">
                    @if ($errors->has('password_confirmation'))
                        @foreach ($errors->get('password_confirmation') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @else
                        <strong>{{ __('The password confirmation field is required.') }}</strong>
                    @endif
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted">
        <a href="{{ route('login') }}">{{ __('Take me back') }}</a> {{ __('to the sign in screen.') }}
    </div>
</div>
@endsection
