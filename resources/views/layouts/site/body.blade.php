<body>
    @include('layouts.site.header.preloader')
    @include('layouts.site.header.header')
    @include('layouts.site.header.header-responsive')
    <div class="header-spacer"></div>
    @yield('body')
    <a class="back-to-top" href="#">
    	<img src="/assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>
    @include('layouts.site.javascript')
    @yield('javascript')
    @stack('javascript')
</body>
