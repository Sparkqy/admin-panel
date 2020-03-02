@if (session()->has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><i class="fa fa-check-circle"></i> {{ session()->get('success') }}</strong>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><i class="fa fa-exclamation-circle"></i> {{ session()->get('error') }}</strong>
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><i class="fa fa-exclamation-triangle"></i> {{ session()->get('warning') }}</strong>
    </div>
@endif
