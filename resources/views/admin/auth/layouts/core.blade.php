<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.head')
</head>
<body id="page-top">
@yield('body')
@include('admin.layouts.javascript')
</body>
</html>
