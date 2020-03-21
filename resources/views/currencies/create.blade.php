@extends('layouts.app')
@section('title', 'Add currency')

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Currencies</h1>
        </div>
        <div class="col-12 col-md-6 border p-3">
            <h3 class="h6">Add currency</h3>
            <form action="{{ route('currencies.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="code" class="small text-bold">Code</label>
                    <select
                        class="form-control @include('partials.messages.validation-error-input-class', ['fieldName' => 'code'])"
                        style="width: 100%;" id="code" name="code" required>
                        <option value="">Select currency</option>
                        @foreach($unregisteredCurrencies as $unregisteredCurrency)
                            <option value="{{ $unregisteredCurrency }}">{{ $unregisteredCurrency }}</option>
                        @endforeach
                    </select>
                    @include('partials.messages.validation-errors', ['fieldName' => 'code'])
                </div>
                <div class="form-group">
                    <label for="symbol" class="small text-bold">Symbol</label>
                    <input type="text" maxlength="1"
                           class="form-control @include('partials.messages.validation-error-input-class', ['fieldName' => 'symbol'])"
                           style="width: 100%;" id="symbol" name="symbol" value="{{ old('symbol') }}" required>
                    @include('partials.messages.validation-errors', ['fieldName' => 'symbol'])
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('currencies.index') }}" class="col-md-3 btn btn-default mr-3">Cancel</a>
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

        });
    </script>
@endpush

