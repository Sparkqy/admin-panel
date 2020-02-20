@if ($errors->has((string) $fieldName))
    <p class="small text-danger mt-1">
        <i class="fa fa-exclamation-circle text-danger"></i> {{ $errors->first($fieldName) }}
    </p>
@endif
