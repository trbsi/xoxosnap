@extends('layouts.auth.core')
@section('css')
<style>
    .landing-content * {
    color: gray;
    }
    .nav-item:hover a {
    color: gray!important;
    }
    .header--standard-landing .header-menu .nav-item a, .header--standard-landing .header-menu li a {
    color: gray;
    fill: gray;
    display: block;
    }
    .header--standard-landing .header-menu .nav-item a:hover, .header--standard-landing .header-menu li a:hover {
    color: gray;
    fill: gray;
    display: block;
    }
    .header--standard-landing .dropdown-toggle::after {
    border-top-color: gray;
    }
    .registration-login-form a {
    color: white;
    }
    .login-register:hover {
    color: gray;
    }
</style>
@endsection
@section('body')
<div class="content-bg-wrap"></div>
<!-- Header Standard Landing  -->
<div class="header--standard header--standard-landing" id="header--standard">
    <div class="container">
        <div class="header--standard-wrap">
            <a href="/" class="logo">
                <div class="img-wrap">
                    <img src="/img/logo.png" alt="Olympus">
                    <img src="/img/logo-colored-small.png" alt="Olympus" class="logo-colored">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">{{config('app.name')}}</h6>
                </div>
            </a>
            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                <svg class="olymp-menu-icon">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                </svg>
            </a>
            <?php /*
                <div class="nav nav-pills nav1 header-menu">
                	<div class="mCustomScrollbar">
                		<ul>
                			<li class="nav-item">
                				<a href="#" class="nav-link">Home</a>
                			</li>
                			<li class="nav-item dropdown">
                				<a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
                				<div class="dropdown-menu">
                					<a class="dropdown-item" href="#">Profile Page</a>
                					<a class="dropdown-item" href="#">Newsfeed</a>
                					<a class="dropdown-item" href="#">Post Versions</a>
                				</div>
                			</li>
                			<li class="nav-item dropdown dropdown-has-megamenu">
                				<a href="#" class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
                				<div class="dropdown-menu megamenu">
                					<div class="row">
                						<div class="col col-sm-3">
                							<h6 class="column-tittle">Main Links</h6>
                							<a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-blue-light">new</span></a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                						</div>
                						<div class="col col-sm-3">
                							<h6 class="column-tittle">BuddyPress</h6>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-primary">HOT!</span></a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                						</div>
                						<div class="col col-sm-3">
                							<h6 class="column-tittle">Corporate</h6>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                						</div>
                						<div class="col col-sm-3">
                							<h6 class="column-tittle">Forums</h6>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                							<a class="dropdown-item" href="#">Profile Page</a>
                						</div>
                					</div>
                				</div>
                			</li>
                			<li class="nav-item">
                				<a href="#" class="nav-link">Terms & Conditions</a>
                			</li>
                			<li class="nav-item">
                				<a href="#" class="nav-link">Events</a>
                			</li>
                			<li class="nav-item">
                				<a href="#" class="nav-link">Privacy Policy</a>
                			</li>
                			<li class="close-responsive-menu js-close-responsive-menu">
                				<svg class="olymp-close-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                			</li>
                			<li class="nav-item js-expanded-menu">
                				<a href="#" class="nav-link">
                					<svg class="olymp-menu-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                					<svg class="olymp-close-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                				</a>
                			</li>
                		</ul>
                	</div>
                </div>
                */ ?>
        </div>
    </div>
</div>
<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>
<div class="container">
    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                <h1>{{config('app.name')}}</h1>
                <p>{!! __('auth.ps_auth_description') !!}
                </p>
            </div>
        </div>
        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
            <!-- Login-Registration Form  -->
            <!-- Tab panes -->
            @yield('form-section')
            <!-- ... end Login-Registration Form  -->		
        </div>
    </div>
</div>

<!-- Window Popup Main Search -->
<div class="modal fade" id="main-popup-search" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>
            <div class="modal-body">
                <form class="form-inline search-form" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">What are you looking for?</label>
                        <input class="form-control bg-white" placeholder="" type="text" value="">
                    </div>
                    <button class="btn btn-purple btn-lg">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $('.explanation').click(function() {
    	$('#explanation-details').toggle();
    });
</script>
@endsection