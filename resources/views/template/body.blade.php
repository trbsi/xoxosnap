<body>
    @include('template.body.preloader')
    @include('template.body.header')
    @include('template.body.header-responsive')
    <div class="header-spacer"></div>
    @yield('body')
    <a class="back-to-top" href="#">
    	<img src="/assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>
    @include('template.javascript')
    @yield('javascript')
</body>
