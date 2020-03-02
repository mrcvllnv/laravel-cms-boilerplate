@extends('errors::layout')

@section('title', __('Maintenance Mode'))
@section('heading')
    <img src="{{ asset('assets/media/undraw_maintenance_cn7j.svg') }}" class="h-8 mb-4" alt="">
@endsection
@section('subheading', __('Temporarily down for maintenance.'))
@section('message', __('Sorry for the inconvenience but we’re performing some maintenance at the moment. We’ll be back online shortly!'))