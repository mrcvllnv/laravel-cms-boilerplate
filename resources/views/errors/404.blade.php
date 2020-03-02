@extends('errors::layout')

@section('title', __('Page Not Found'))
@section('heading')
    <img src="{{ asset('assets/media/undraw_void_3ggu.svg') }}" class="h-8 mb-4" alt="">
@endsection
@section('subheading', __('The page you were looking for doesn\'t exist.'))
@section('message', __('You may have mistyped the address or the page may have moved.'))