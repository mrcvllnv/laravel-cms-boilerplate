@extends('errors::layout')

@section('title', __('Internal Server Error'))
@section('heading')
    <img src="{{ asset('assets/media/undraw_warning_cyit.svg') }}" class="h-8 mb-4" alt="">
@endsection
@section('subheading', __('Something is broken here.'))
@section('message', __('We\'re experiencing an internal server problem. Please, try again later.'))