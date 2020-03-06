@extends('layouts.app')

@section('title', __('Contacts'))

@section('content')
<div class="container">
    <!-- Page title -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <h2 class="page-title">
                    {{ __('Contacts') }}
                </h2>
            </div>
            <div class="col-auto">
                <div class="text-muted text-h5 mt-2 information-wrapper"></div>
            </div>
            <div class="col-auto ml-auto d-print-none">
                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <input type="text" class="form-control datatable-search" placeholder="Search…">
                    </div>
                    <div class="p-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            {{ __('Create Contact') }}
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
                        <th class="cursor-pointer">{{ __('Contact') }}</th>
                        <th class="cursor-pointer">{{ __('Address') }}</th>
                        <th class="cursor-pointer">{{ __('Email') }}</th>
                        <th class="cursor-pointer">{{ __('Phone') }}</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('partials.datatables.footer')
    @include('contacts.partials.add_modal')
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $(function() {
            var dataTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "GET",
                    url : "{!! route('contacts.datatables') !!}",
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                },
                columns: [
                    { data: 'contact', name: 'contact' },
                    { data: 'address', name: 'address' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false,},
                ],
            });

            // Set datatable search trigger
            $('.datatable-search').keyup(function(){
                dataTable.search($(this).val()).draw();
            });

            // Set datatable length trigger
            $('.datatable-length').change(function(){
                dataTable.page.len($(this).val()).draw();
            });

            $('#contact-form').submit(function() {
                //
            });

            $('#modal-contact').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
                $(this).find('form').removeClass('was-validated');
            })
        });
    </script>
@endsection
