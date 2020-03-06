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
                            <div class="dropdown-menu h-auto" style="max-height: 300px; overflow-x: hidden;">
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
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg> 
                                    Filter
                                </button>
                                <div class="dropdown-menu" onclick="event.stopPropagation();">
                                    <span class="dropdown-header">Status</span>
                                    <label class="dropdown-item">
                                        <input class="form-check-input m-0 mr-2" name="status" value="1" type="radio"> All
                                    </label>
                                    <label class="dropdown-item">
                                        <input class="form-check-input m-0 mr-2" name="status" value="0" type="radio" checked> Active
                                    </label>
                                    <label class="dropdown-item">
                                        <input class="form-check-input m-0 mr-2" name="status" value="2" type="radio"> Inactive
                                    </label>
                                </div>
                            </div>
                            <input type="text" class="form-control datatable-search" placeholder="Search…">
                        </div>
                    </div>
                    <div class="p-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            {{ __('Create User') }}
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
                        <th class="cursor-pointer">{{ __('User') }}</th>
                        <th class="cursor-pointer">{{ __('Created') }}</th>
                        <th class="cursor-pointer">{{ __('Status') }}</th>
                        <th></th>
                        <th></th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('partials.datatables.footer')
    @include('users.partials.add_modal')
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
                order: [[3, 'desc']],
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
            // $('table').on('click', 'tbody td, thead th:first-child', function(e){
            //     $(this).parent().find('input[type="checkbox"]').trigger('click');
            // });

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

            $('.datatable-search').keyup(function(){
                dataTable.search($(this).val()).draw() ;
            })

            $('.datatable-length').change(function(){
                dataTable.page.len($(this).val()).draw() ;
            })

            var status;
            
            $('input[name="status"]').change(function() {
                status = $(this).val();
                dataTable.draw();
            });

            dataTable.on('preXhr.dt', function(ev, settings, data) {
                data.status = status 
            });

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
