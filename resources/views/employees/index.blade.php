@extends('layouts.app')
@section('title', 'Employees')

@push('page-styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Employees</h1>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add employee</a>
        </div>
        @include('partials.messages.flash-messages')
        <div class="border">
            <h3 class="h6 p-3">Employee list</h3>
            <table class="table table-responsive-sm table-bordered table-striped" id="employeesTable"
                   style="width: 100% !important;">
                <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Date of employment</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Email</th>
                    <th scope="col">
                        Salary {{ $currentCurrencySymbol  }}
                    </th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('employees.modals.remove')
@endsection

@push('page-scripts')
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Datatables configuration
            let table = $('#employeesTable').DataTable({
                lengthMenu: [50, 150, 250, 500],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('api.employees.make-datatable') }}",
                },
                columns: [
                    {data: 'profile_image', name: 'profile_image', orderable: false},
                    {data: 'name', name: 'name', orderable: false},
                    {data: 'position', name: 'position', orderable: false},
                    {data: 'date_of_employment', name: 'date_of_employment'},
                    {data: 'phone_number', name: 'phone_number', orderable: false},
                    {data: 'email', name: 'email', orderable: false},
                    {data: 'salary', name: 'salary'},
                    {data: 'actions', name: 'actions', orderable: false},
                ]
            });

            let paddingXElements = '.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter';
            let paddingXYElements = '.dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate';

            $(paddingXElements).addClass('px-3');
            $(paddingXYElements).addClass('p-3');
        });

        // Trigger remove employee modal window and config form
        $(document).on('click', '#remove-employee', function () {
            let removeEmployeeId = $(this).data('id');
            let removeEmployeeName = $(this).data('name');

            $('#remove-employee-form').attr('action', '{{ url('employees') . '/' }}' + removeEmployeeId);
            $('#remove-employee-name').html(removeEmployeeName);
            $('#removing-employee-modal').modal('show');
        });
    </script>
@endpush
