@extends('layouts.app')
@section('title', 'Positions')

@push('page-styles')
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Positions</h1>
            <a href="{{ route('positions.create') }}" class="btn btn-primary">Add position</a>
        </div>
        <div class="border">
            <h3 class="h6 p-3">Position list</h3>
            <table class="table table-responsive-sm table-bordered table-striped" id="positionsTable"
                   style="width: 100% !important;">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Last update</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#positionsTable').DataTable({
                lengthMenu: [20, 50, 100, 200],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('api.positions.make-datatable') }}",
                },
                columns: [
                    {data: 'name', name: 'name', orderable: false},
                    {data: 'updated_at', name: 'updated_at', orderable: false},
                    {data: 'actions', name: 'actions', orderable: false},
                ]
            });

            let paddingXElements = '.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter';
            let paddingXYElements = '.dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate';

            $(paddingXElements).addClass('px-3');
            $(paddingXYElements).addClass('p-3');
        });
    </script>
@endpush
