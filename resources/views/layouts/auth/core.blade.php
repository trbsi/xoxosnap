<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.site.head')
@yield('css')
<body class="auth">
@yield('body')
@include('layouts.site.javascript')
@yield('javascript')
@stack('javascript')
</body>
</html>
