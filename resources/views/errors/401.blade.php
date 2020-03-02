@extends('errors::layout')

@section('title', __('Unauthorized'))
@section('heading')
    <img src="{{ asset('assets/media/undraw_security_o890.svg') }}" class="h-8 mb-4" alt="">
@endsection
@section('subheading', __('Unauthorized'))
@section('message', __('We are sorry but you are not authorized to access this page.'))