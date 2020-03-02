@extends('errors::layout')

@section('title', __('Session Expired'))
@section('heading')
    <img src="{{ asset('assets/media/undraw_void_3ggu.svg') }}" class="h-8 mb-4" alt="">
@endsection
@section('subheading', __('Sorry, your session has expired.'))
@section('message', __('Please refresh and try again.'))