<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Test task')</title>
    @include('partials.styles')
    @stack('page-styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('partials.navbars.no-sidebar_navbar')

    @yield('content')
</div>
@include('partials.js')
@stack('page-scripts')
</body>
</html>
