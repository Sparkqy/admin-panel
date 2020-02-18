@extends('layouts.app')
@section('title', 'Add employee')

@push('page-styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
@endpush

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Employees</h1>
        </div>
        <div class="col-12 col-md-6 border p-3">
            <h3 class="h6">Add employee</h3>
            <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="profile_image" class="small text-bold">Photo</label>
                    <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                    <small class="text-muted">File format jpg, png up to 5MB, the minimum size of 300x300px</small>
                    @if ($errors->has('profile_image'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('profile_image') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name" class="small text-bold">Name</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name"
                           value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone_number" class="small text-bold">Phone</label>
                    <input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number"
                           value="{{ old('phone_number', '+380') }}" required>
                    @if ($errors->has('phone_number'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('phone_number') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="small text-bold">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                           value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="position" class="small text-bold">Position</label>
                    <select class="form-control" style="width: 100%;" id="position" name="position_id"
                            required></select>
                    @if ($errors->has('position_id'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('position_id') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="salary" class="small text-bold">Salary</label>
                    <input type="number" step="0.001" min="0" max="500.000" class="form-control form-control-sm"
                           id="salary" name="salary" value="{{ old('salary') }}" required>
                    @if ($errors->has('salary'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('salary') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="head" class="small text-bold">Head</label>
                    <select class="form-control" style="width: 100%;" id="head" name="head_id"></select>
                    @if ($errors->has('head_id'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first('boss_id') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date_of_employment" class="small text-bold">Date of employment</label>
                    <input type="text" class="form-control form-control-sm" id="date_of_employment"
                           name="date_of_employment" value="{{ old('date_of_employment') }}" autocomplete="off"
                           required>
                    @if ($errors->has('date_of_employment'))
                        <p class="small text-danger mt-1">
                            <i class="fa fa-exclamation-circle text-danger"></i>{{ $errors->first('date_of_employment') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('employees.index') }}" class="col-md-3 btn btn-default mr-3">Cancel</a>
                        <button type="submit" class="col-md-3 btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#phone_number').mask('+380 (00) 000 00 00');
            $('#salary').mask('000.000');
            $('#date_of_employment').datepicker({
                format: "dd.mm.yyyy",
                todayHighlight: true
            });

            $('#position').select2({
                placeholder: 'Start typing position title',
                ajax: {
                    url: '{{ route('api.positions.search-by-name') }}',
                    dataType: 'json',
                    delay: 250,
                    cache: true,
                },
            });

            $('#head').select2({
                placeholder: 'Start typing name of boss',
                minimumInputLength: 2,
                ajax: {
                    url: '{{ route('api.employees.search-by-name') }}',
                    dataType: 'json',
                    delay: 250,
                    cache: true
                },
            });
        });
    </script>
@endpush

