@extends('layouts.auth')

@section('title', __('Confirm Password'))

@section('content')
<div class="container-tight py-6">
    <form class="card card-md needs-validation" novalidate method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="card-body">
            <h2 class="mb-5 text-center">{{ __('Confirm Password') }}</h2>
            <p class="text-muted">{{ __('Please confirm your password before continuing.') }}</p>
            <div class="mb-2">
                <label class="form-label">
                    {{ __('Password') }}
                    <span class="form-label-description">
                        <a tabindex="-1" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                    </span>
                </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autofocus>
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
                <button type="submit" class="btn btn-primary btn-block">{{ __('Confirm Password') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
