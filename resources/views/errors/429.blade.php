@extends('errors::layout')

@section('title', __('Too Many Requests'))
@section('heading')
    <div class="display-4">429</div>
@endsection
@section('message', __('Too Many Requests'))
