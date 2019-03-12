<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.site.head')
@stack('my-css')

@include('layouts.site.body')
</html>
