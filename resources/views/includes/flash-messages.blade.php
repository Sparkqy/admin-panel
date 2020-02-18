@if (session()->has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session()->get('success') }}</strong>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session()->get('error') }}</strong>
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session()->get('warning') }}</strong>
    </div>
@endif
