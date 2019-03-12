<head>
    <title>@yield('title')</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="/assets/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/Bootstrap/dist/css/bootstrap-grid.css">
    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/fonts.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/zuck.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/story-skins/snapgram.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/plyr.css">
    @stack('css')
    <!-- Main Font -->
    <script src="/assets/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
</head>
