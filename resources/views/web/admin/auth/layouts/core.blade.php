<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('web.admin.layouts.head')
</head>
<body id="page-top">
@yield('body')
@include('web.admin.layouts.javascript')
</body>
</html>
