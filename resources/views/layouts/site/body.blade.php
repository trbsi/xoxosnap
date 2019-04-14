<body>
@include('layouts.site.header.preloader')
@include('layouts.site.responsive.sidebar-left')
@include('layouts.site.header.header')
@include('layouts.site.responsive.header')
<div class="header-spacer"></div>
@yield('body')

<ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="click">
    <li class="mfb-component__wrap">
        <a href="#" class="mfb-component__button--main">
            <i class="mfb-component__main-icon--resting fas fa-plus"></i>
            <i class="mfb-component__main-icon--active fas fa-times"></i>
        </a>
        <ul class="mfb-component__list">
            <li>
                <a href="{{env('TWITTER_LINK')}}" target="_blank" data-mfb-label="Visit us on Twitter"
                   class="mfb-component__button--child">
                    <i class="mfb-component__child-icon fab fa-twitter fa-3x"></i>
                </a>
            </li>
            <li>
                <a href="{{env('INSTAGRAM_LINK')}}" target="_blank" data-mfb-label="Visit us on Instagram"
                   class="mfb-component__button--child">
                    <i class="mfb-component__child-icon fab fa-instagram fa-3x"></i>
                </a>
            </li>

            <li>
                <a href="{{env('DISCORD_LINK')}}" target="_blank" data-mfb-label="Visit us on Discord"
                   class="mfb-component__button--child">
                    <i class="mfb-component__child-icon fab fa-discord fa-5x"></i>
                </a>
            </li>
        </ul>
    </li>
</ul>

@include('layouts.site.javascript')
@yield('javascript')
@stack('javascript')
</body>
