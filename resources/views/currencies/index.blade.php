@extends('layouts.app')
@section('title', 'Currency settings')

@section('content')
    <div class="col-12 p-3">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h4">Currency settings</h1>
            <a href="{{ route('currencies.index') }}" class="btn btn-primary">Add currency</a>
        </div>
        @include('partials.messages.flash-messages')

        <div class="row">
            @foreach($currencies as $currency)
                <div class="mr-5 info-box bg-gray-light">
                    <span class="info-box-icon">{{ $currency->symbol }}</span>
                    <div class="info-box-content">
                        <span class="info-box-text">
                            {{ $currency->code }}
                            @if(\App\Helpers\Cookies\Cookie::get(\App\Models\Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME) === $currency->code)
                                <span class="small">(current system currency)</span>
                            @endif
                        </span>
                        <span class="info-box-number">Rate: {{ $currency->rate }}</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">70% Increase in 30 Days</span>
                        <div class="btn-group">
                            <a href="{{ route('currencies.show', $currency->code) }}" class="btn btn-sm btn-success" title="Preview currency">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('currencies.set-currency', $currency->code) }}"
                               class="btn btn-sm btn-primary" title="Set currency">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('positions.modals.remove')
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
