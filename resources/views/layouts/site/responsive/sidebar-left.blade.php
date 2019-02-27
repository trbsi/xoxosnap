<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="#" class="logo js-sidebar-open">
			<img src="/img/logo.png" alt="{{config('app.name')}}">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="/img/logo.png" alt="{{config('app.name')}}">
			</div>
			<div class="title-block">
				<h6 class="logo-title">{{config('app.name')}}</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						<img alt="author" src="@if (null !== $profilePicture) {{$profilePicture}} @else /img/forum1.png @endif" class="avatar">
					</div>
					<a href="@if (null !== $username) {{route('user.profile', ['username' => $username])}} @else javascript:; @endif" class="author-name fn">
						<div class="author-title">
							{{$name}} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
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
					<a href="#">

						<svg class="olymp-menu-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

						<span>{{__('general/user-menu.profile_settings')}}</span>
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

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">{{__('general/user-menu.about')}} {{config('app.name')}}</h6>
			</div>

			<ul class="about-olympus">
				<li>
                    <a href="{{route('terms-of-use')}}">
                    <span>{{__('general/legal.terms_of_use')}}</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('privacy-policy')}}">
                    <span>{{__('general/legal.privacy_policy')}}</span>
                    </a>
                </li>
			</ul>

		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->