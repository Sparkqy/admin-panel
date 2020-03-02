@extends('layouts.app')
@section('title', 'Add position')

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Positions</h1>
        </div>
        <div class="col-12 col-md-6 border p-3">
            <h3 class="h6">Add position</h3>
            <form action="{{ route('positions.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="small text-bold">Name</label>
                    <input type="text"
                           class="form-control form-control-sm @include('partials.messages.validation-error-input-class', ['fieldName' => 'name'])"
                           id="name" name="name" minlength="6" maxlength="256"
                           value="{{ old('name') }}" required>
                    <p class="small text-muted text-right"><span id="name-field-count"></span> / 256</p>
                    @include('partials.messages.validation-errors', ['fieldName' => 'name'])
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
    <script>
        $(document).ready(function () {
            let $name_input = $('#name');
            $("#name-field-count").text($name_input.val().length);

            $name_input.on('keyup', function () {
                $("#name-field-count").text($(this).val().length);
            });
        });
    </script>
@endpush
