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
                        <div class="btn-list select-action" style="display: none;">
                            <button class="btn btn-outline-link disabled px-0 select-info"></button>
                            <button class="btn btn-secondary dropdown-toggle" data-boundary="viewport" data-toggle="dropdown">Change Status</button>
                            <div class="dropdown-menu dropdown-menu-right h-auto" style="max-height: 300px; overflow-x: hidden;">
                                <a class="dropdown-item" href="#">
                                    Active
                                    <span class="badge bg-green ml-auto"></span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    Inactive
                                    <span class="badge bg-yellow ml-auto"></span>
                                </a>
                                <span class="dropdown-header"></span>
                            </div>
                            <button type="button" class="btn btn-danger btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </span>
                            <input type="text" class="form-control d-inline-block w-9 mr-3" placeholder="Search…" id="datatable-search">
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
            <table id="dataTable" class="table card-table table-hover table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th class="w-2"><input name="select_all" class="form-check-input" value="1" type="checkbox"></th>
                        <th></th>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Created') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th></th>
                        <th></th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="d-flex">
        <div class="text-muted">
            {{ __('Show') }}
            <div class="mx-1 d-inline-block">
                <select id="datatable-length" class="form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="-1">All</option>
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
            var selectedRows = [];

            function updateDataTableSelectAllCtrl(table){
                var $table             = table.table().node();
                var $allCheckbox       = $('tbody input[type="checkbox"]', $table);
                var $checkedCheckbox   = $('tbody input[type="checkbox"]:checked', $table);
                var selectAllCheckbox  = $('thead input[name="select_all"]', $table).get(0);

                // If none of the checkboxes are checked
                if($checkedCheckbox.length === 0){
                    selectAllCheckbox.checked = false;
                    if('indeterminate' in selectAllCheckbox){
                        selectAllCheckbox.indeterminate = false;
                    }
                // If all of the checkboxes are checked
                } else if ($checkedCheckbox.length === $allCheckbox.length){
                    selectAllCheckbox.checked = true;
                    if('indeterminate' in selectAllCheckbox){
                        selectAllCheckbox.indeterminate = false;
                    }

                // If some of the checkboxes are checked
                } else {
                    selectAllCheckbox.checked = true;
                    if('indeterminate' in selectAllCheckbox){
                        selectAllCheckbox.indeterminate = true;
                    }
                }

                // Update selection info
                updateDataTableSelectInfo(selectedRows);
            }

            function updateDataTableSelectInfo(_selectedRows) {
                $('.select-info').text('')
                $('.select-action').hide();

                if (_selectedRows.length > 0) {
                    $('.select-info').text(_selectedRows.length + ' row'+ (_selectedRows.length > 1 ? 's' : '') +' selected')
                    $('.select-action').show();
                }
            }

            var dataTable = $('#dataTable').DataTable({
                initComplete: function() {
                    $('#dataTable_info').prependTo('.information-wrapper')
                    $('#dataTable_paginate').appendTo('.pagination-wrapper')
                },
                responsive: true,
                searchDelay: 200,
                processing: true,
                serverSide: true,
                ajax: {
                    type: "GET",
                    url : "{!! route('users.datatables') !!}",
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                },
                columns: [
                    {
                        targets: 0,
                        searchable: false,
                        orderable: false,
                        render: function (data, type, full, meta){
                            return '<input type="checkbox" class="form-check-input">';
                        }
                    },
                    { data: 'id', name: 'id', visible: false, orderable: false, searchable: false },
                    { data: 'user', name: 'user' },
                    { data: 'created', name: 'created' },
                    { data: 'status', name: 'status' },
                    { data: 'first_name', name: 'first_name', visible: false, orderable: false, searchable: false },
                    { data: 'last_name', name: 'last_name', visible: false, orderable: false, searchable: false },
                    { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false,},
                ],
                dom: 'tip',
                order: [[2, 'desc']],
                rowCallback: function(row, data, dataIndex){
                    // Get row ID
                    var rowId = data['id'];

                    // If row ID is in the list of selected row IDs
                    if($.inArray(rowId, selectedRows) !== -1){
                        $(row).find('input[type="checkbox"]').prop('checked', true);
                        $(row).addClass('selected');
                    }
                },
            });

            // Handle click on checkbox
            $('#dataTable tbody').on('click', 'input[type="checkbox"]', function(e){
                var $row = $(this).closest('tr');

                // Get row data
                var data = dataTable.row($row).data();

                // Get row ID
                var rowId = data['id'];

                // Determine whether row ID is in the list of selected row IDs
                var index = $.inArray(rowId, selectedRows);

                // If checkbox is checked and row ID is not in list of selected row IDs
                if(this.checked && index === -1){
                    selectedRows.push(rowId);

                // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
                } else if (!this.checked && index !== -1){
                    selectedRows.splice(index, 1);
                }

                if(this.checked){
                    $row.addClass('selected');
                    $('.select-action .dropdown-menu .dropdown-header').text('Selected Users ('+ selectedRows.length +')')
                    $('.select-action .dropdown-menu').append(`<a href="#" class="dropdown-item disabled text-dark" data-id="`+ data['id'] +`">
                                    <span class="avatar avatar-sm rounded mr-2">`+ data['initials'] +`</span>
                                    `+ data['full_name'] +`
                                </a>`);
                } else {
                    $row.removeClass('selected');
                    $('.select-action .dropdown-menu .dropdown-header').text('Selected Users ('+ selectedRows.length +')')
                    $('.select-action .dropdown-menu a[data-id="'+ data['id'] +'"]').remove();
                }


                // Update state of "Select all" control
                updateDataTableSelectAllCtrl(dataTable);

                // Update selection info
                updateDataTableSelectInfo(selectedRows);

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle click on table cells with checkboxes
            $('table').on('click', 'tbody td, thead th:first-child', function(e){
                $(this).parent().find('input[type="checkbox"]').trigger('click');
            });

            // Handle click on "Select all" control
            $('#dataTable thead input[name="select_all"]', dataTable.table().container()).on('click', function(e){
                if(this.checked){
                    $('tbody input[type="checkbox"]:not(:checked)').trigger('click');
                } else {
                    $('tbody input[type="checkbox"]:checked').trigger('click');
                }

                // Prevent click event from propagating to parent
                e.stopPropagation();
            });

            // Handle table draw event
            dataTable.on('draw', function(){
                // Update state of "Select all" control
                updateDataTableSelectAllCtrl(dataTable);
            });

            $('#datatable-search').keyup(function(){
                dataTable.search($(this).val()).draw() ;
            })

            $('#datatable-length').change(function(){
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
