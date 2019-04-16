<?php 
use App\Models\User;
?>
<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small performer-tour-responsive-user-menu" id="sidebar-left-responsive">
		<a href="/" class="logo js-sidebar-open">
			<img src="/img/logo/logo-variation-2-xsml.png" alt="{{config('app.name')}}">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="/" class="logo">
			<div class="img-wrap">
				<img src="/img/logo/logo-xsml.png" alt="{{config('app.name')}}">
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						@component('components.user.profile-picture-component', [
							'isVerified' => $userComposerIsVerified,
							'profilePicture' => $userComposerProfilePicture,
							'verifiedTickSizeClass' => 'verified-tick-small'
						])
						@endcomponent
					</div>
					<a href="@if (null !== $userComposerUsername && User::USER_TYPE_PERFORMER === $userComposerProfileType) {{route('web.user.profile', ['username' => $userComposerUsername])}} @else javascript:; @endif" class="author-name fn">
						<div class="author-title">
							{{$userComposerName}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
						</div>
					</a>
				</div>
			</div>

			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
						<span class="left-menu-title">{{__('general/user-menu.collapse_menu')}}</span>
					</a>
				</li>
			</ul>


			@auth
			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">{{__('general/user-menu.your_account')}}</h6>
			</div>

			<ul class="account-settings">
				<li>
					<a href="{{route('web.user.profile.settings.account-settings')}}">
						<svg class="olymp-menu-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

						<span>{{__('general/user-menu.profile_settings')}}</span>
					</a>
				</li>
				<li>
                    <a href="{{route('web.coins.show-buy-coins-form')}}">
                        <svg class="olymp-piggy-bank">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-piggy-bank"></use>
                        </svg>
                        <span>{{__('general/user-menu.buy_coins')}}</span>
                    </a>
                </li>
				<li>
					<a href="javascript:;" class="logout-link">
						<svg class="olymp-logout-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

						<span>{{__('general/user-menu.logout')}}</span>
					</a>
				</li>
			</ul>
			@endauth

			@guest                            
            <ul class="account-settings">
                <li>
                    <a href="{{route('login')}}">
                        <svg class="olymp-menu-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-login-icon"></use>
                        </svg>
                        <span>{{__('general/user-menu.login')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('register')}}">
                        <svg class="olymp-menu-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-register-icon"></use>
                        </svg>
                        <span>{{__('general/user-menu.register')}}</span>
                    </a>
                </li>
            </ul>
            @endguest

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">{{__('general/user-menu.about')}} {{config('app.name')}}</h6>
			</div>

			<ul class="about-olympus">
				<li>
                    <a href="{{route('web.terms-of-use')}}">
                    <span>{{__('general/legal.terms_of_use')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('web.privacy-policy')}}">
                    <span>{{__('general/legal.privacy_policy')}}</span>
                    </a>
                </li>
			</ul>

		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->