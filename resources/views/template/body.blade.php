<body>
    @include('template.header.preloader')
    @include('template.header.header')
    @include('template.header.header-responsive')
    <div class="header-spacer"></div>
    @yield('body')
    <a class="back-to-top" href="#">
    	<img src="/assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>
    @include('template.javascript')
    @yield('javascript')
</body>
