@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    {{ __('Overview') }}
                </div>
                <h2 class="page-title">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection
