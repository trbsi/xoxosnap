<head>
    <title>@yield('title')</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('meta')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/all.css">

    @stack('css')
    <!-- Main Font -->
    <script src="/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
</head>
