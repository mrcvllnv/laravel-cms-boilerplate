@extends('errors::layout')

@section('title', __('Forbidden'))
@section('heading')
    <div class="display-4">403</div>
@endsection
@section('subheading', __('Forbidden'))
@section('message', __($exception->getMessage() ?: 'Forbidden'))
