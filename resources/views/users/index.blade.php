@extends('layouts.app')

@section('title', __('Users'))

@section('content')
<div class="container">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    {{ __('Users') }}
                </h2>
            </div>
            <div class="col-auto">
                <div class="text-muted text-h5 mt-2 information-wrapper"></div>
            </div>
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </span>
                            <input type="text" class="form-control d-inline-block w-9 mr-3" placeholder="Search…" id="dataTableSearch">
                        </div>
                    </div>
                    <div class="p-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            {{ __('New User') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table id="dataTable" class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Created') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th class="w-8 text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><span class="text-muted">{{ $user->id }}</span></td>
                            <td>
                                <div class="d-flex">
                                    <span class="avatar mt-1 {{ Arr::random(['bg-green-lt', 'bg-red-lt', 'bg-yellow-lt', 'bg-blue-lt', 'bg-purple-lt']) }}">{{ $user->initials }}</span>
                                    <div class="text-truncate ml-2">
                                        <a href="#" class="text-body d-block">{{ $user->full_name }}</a>
                                        <small class="d-block text-muted text-truncate mt-n1">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td>
                                <span class="status-icon bg-success"></span> Active
                            </td>
                            <td class="text-center">
                                <span class="dropdown ml-1">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle align-text-top" data-boundary="viewport" data-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">
                                            Action
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            Another action
                                        </a>
                                    </div>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex">
        <div class="text-muted">
            {{ __('Show') }}
            <div class="mx-1 d-inline-block">
                <select id="dataTableLength" class="form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            {{ __('entries') }}
        </div>
        <div class="pagination-wrapper m-0 ml-auto"></div>
    </div>
    <div class="modal modal-blur fade" id="modal-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="user-form" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Create New User') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('First Name') }}</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ __('The first name field is required.') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Last Name') }}</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ __('The last name field is required.') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Email address') }}</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ __('The email field is required.') }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ __('The password field is required.') }}</strong>
                                    </div>
                                    <small class="text-muted">{{ __('This will be used as a temporary password.') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ __('The password confirmation field is required.') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">{{ __('Cancel') }}</a>
                        <button type="submit" class="btn btn-primary ml-auto">
                            {{ __('Create New User') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $(function() {
            var dataTable = $('#dataTable').DataTable({
                initComplete: function() {
                    $('#dataTable_info').prependTo('.information-wrapper')
                    $('#dataTable_paginate').appendTo('.pagination-wrapper')
                },
                responsive: true,
                searchDelay: 500,
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: [-1],
                }],
                dom: 'tip'
            });

            $('#dataTableSearch').keyup(function(){
                dataTable.search($(this).val()).draw() ;
            })

            $('#dataTableLength').change(function(){
                dataTable.page.len($(this).val()).draw() ;
            })

            $('#user-form').submit(function() {
                //
            });

            $('#modal-user').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
                $(this).find('form').removeClass('was-validated');
            })
        });
    </script>
@endsection
