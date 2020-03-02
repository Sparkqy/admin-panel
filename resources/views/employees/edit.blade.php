@extends('layouts.app')
@section('title', 'Edit employee')

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
            <h3 class="h6">Edit employee</h3>
            <form action="{{ route('employees.update', $employee) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="profile_image" class="small text-bold">Photo</label>
                    <div class="mb-3">
                        <img src="{{ asset($employee->profile_image) }}" alt="{{ $employee->name }} profile image"
                             class="img-thumbnail profile-image-thumbnail">
                    </div>
                    <input type="file"
                           class="form-control-file  @include('partials.messages.validation-error-input-class', ['fieldName' => 'profile_image'])"
                           id="profile_image" name="profile_image">
                    <small class="text-muted">File format jpg, png up to 5MB, the minimum size of 300x300px</small>
                    @include('partials.messages.validation-errors', ['fieldName' => 'profile_image'])
                </div>
                <div class="form-group">
                    <label for="name" class="small text-bold">Name</label>
                    <input type="text"
                           class="form-control form-control-sm @include('partials.messages.validation-error-input-class', ['fieldName' => 'name'])"
                           id="name" name="name" minlength="6" maxlength="256"
                           value="{{ old('name', $employee->name) }}" required>
                    <p class="small text-muted text-right"><span id="name-field-count">0</span> / 256</p>
                    @include('partials.messages.validation-errors', ['fieldName' => 'name'])
                </div>
                <div class="form-group">
                    <label for="phone_number" class="small text-bold">Phone</label>
                    <input type="text"
                           class="form-control form-control-sm @include('partials.messages.validation-error-input-class', ['fieldName' => 'phone_number'])"
                           id="phone_number" name="phone_number"
                           value="{{ old('phone_number', $employee->phone_number) }}" required>
                    @include('partials.messages.validation-errors', ['fieldName' => 'phone_number'])
                </div>
                <div class="form-group">
                    <label for="email" class="small text-bold">Email</label>
                    <input type="email"
                           class="form-control form-control-sm @include('partials.messages.validation-error-input-class', ['fieldName' => 'email'])"
                           id="email" name="email"
                           value="{{ old('email', $employee->email) }}" required>
                    @include('partials.messages.validation-errors', ['fieldName' => 'email'])
                </div>
                <div class="form-group">
                    <label for="position" class="small text-bold">Position</label>
                    <select
                        class="form-control @include('partials.messages.validation-error-input-class', ['fieldName' => 'position_id'])"
                        style="width: 100%;" id="position" name="position_id"
                        required>
                        <option value="{{ $employee->position_id }}">{{ $employee->position->name }}</option>
                    </select>
                    @include('partials.messages.validation-errors', ['fieldName' => 'position_id'])
                </div>
                <div class="form-group">
                    <label for="salary" class="small text-bold">Salary</label>
                    <input type="number" step="0.001" min="0" max="500.000"
                           class="form-control form-control-sm @include('partials.messages.validation-error-input-class', ['fieldName' => 'salary'])"
                           id="salary" name="salary" value="{{ old('salary', $employee->salary) }}" required>
                    @include('partials.messages.validation-errors', ['fieldName' => 'salary'])
                </div>
                <div class="form-group">
                    <label for="head" class="small text-bold">Head</label>
                    <select
                        class="form-control @include('partials.messages.validation-error-input-class', ['fieldName' => 'head_id'])"
                        style="width: 100%;" id="head" name="head_id">
                        <option value="{{ $employee->head_id }}">{{ $employee->head->name }}</option>
                    </select>
                    @include('partials.messages.validation-errors', ['fieldName' => 'head_id'])
                </div>
                <div class="form-group">
                    <label for="date_of_employment" class="small text-bold">Date of employment</label>
                    <input type="text"
                           class="form-control form-control-sm input-date @include('partials.messages.validation-error-input-class', ['fieldName' => 'date_of_employment'])"
                           id="date_of_employment"
                           name="date_of_employment"
                           value="{{ old('date_of_employment', $employee->date_of_employment->format('d.m.Y')) }}"
                           autocomplete="off"
                           required>
                    @include('partials.messages.validation-errors', ['fieldName' => 'date_of_employment'])
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
            let $name_input = $('#name');
            $("#name-field-count").text($name_input.val().length);

            $name_input.on('keyup', function () {
                $("#name-field-count").text($(this).val().length);
            });

            // Configuration for input masks
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

