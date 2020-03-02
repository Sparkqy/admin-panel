@extends('layouts.app')
@section('title', 'Edit position')

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Positions</h1>
        </div>
        <div class="col-12 col-md-6 border p-3">
            <h3 class="h6">Edit position</h3>
            <form action="{{ route('positions.update', $position) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name" class="small text-bold">Name</label>
                    <input type="text"
                           class="form-control form-control-sm @include('partials.messages.validation-error-input-class', ['fieldName' => 'name'])"
                           id="name" name="name" minlength="6" maxlength="256"
                           value="{{ old('name', $position->name) }}" required>
                    <p class="small text-muted text-right"><span id="name-field-count">0</span> / 256</p>
                    @include('partials.messages.validation-errors', ['fieldName' => 'name'])
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('positions.index') }}" class="col-md-3 btn btn-default mr-3">Cancel</a>
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

