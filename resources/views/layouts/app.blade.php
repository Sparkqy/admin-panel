<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Test task')</title>
    @include('includes/styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('includes/navbar')

    @url('/login')
    @else
    @include('includes/sidebar')
    @endurl

    <div class="@url('login') @else content-wrapper @endurl">
        @yield('content')
    </div>

</div>
@include('includes/scripts')
</body>
</html>
