@extends('layouts.site.core')

@section('title', __('web/users/resources/profile.profile_settings'))

@section('body')
	@include('web.users.resources.profiles.common.profile-info') 
	<!-- Profile Settings Responsive -->
	<div class="profile-settings-responsive">

		<a href="#" class="js-profile-settings-open profile-settings-open">
			<i class="fa fa-angle-right" aria-hidden="true"></i>
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>
		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<div class="ui-block">
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">{{__('web/users/resources/profile.your_profile')}}</h6>
					</div>

					<div id="accordion1" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne-1">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
										{{__('web/users/resources/profile.profile_settings')}}
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>

							<div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<a href="{{route('user.profile.settings.account-settings')}}">{{__('web/users/resources/profile.account_settings')}}</a>
									</li>
									@if($user::USER_TYPE_PERFORMER === $authUser->profile_type)
									<li>
										<a href="{{route('user.profile.settings.personal-info-settings')}}">{{__('web/users/resources/profile.personal_info')}}</a>
									</li>
									@endif
									<li>
										<a href="{{route('user.profile.settings.change-password-settings')}}">{{__('web/users/resources/profile.change_password')}}</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php /*
					<div class="ui-block-title">
						<a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
						<a href="#" class="items-round-little bg-primary">8</a>
					</div>
					<div class="ui-block-title">
						<a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
					</div>
					<div class="ui-block-title">
						<a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
						<a href="#" class="items-round-little bg-blue">4</a>
					</div>
					*/ ?>
				</div>
			</div>
		</div>
	</div>
	<!-- ... end Profile Settings Responsive -->

	<!-- Your Account Personal Information -->

	<div class="container">
		<div class="row">
			@yield('settings-content')

			<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
				<div class="ui-block">
					<!-- Your Profile  -->
					<div class="your-profile">
						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">{{__('web/users/resources/profile.your_profile')}}</h6>
						</div>
					
						<div id="accordion" role="tablist" aria-multiselectable="true">
							<div class="card">
								<div class="card-header" role="tab" id="headingOne">
									<h6 class="mb-0">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											{{__('web/users/resources/profile.profile_settings')}}
											<svg class="olymp-dropdown-arrow-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
										</a>
									</h6>
								</div>
					
								<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
									<ul class="your-profile-menu">
										<li>
											<a href="{{route('user.profile.settings.account-settings')}}">{{__('web/users/resources/profile.account_settings')}}</a>
										</li>
										@if($user::USER_TYPE_PERFORMER === $authUser->profile_type)
										<li>
											<a href="{{route('user.profile.settings.personal-info-settings')}}">{{__('web/users/resources/profile.personal_info')}}</a>
										</li>
										@endif
										<li>
											<a href="{{route('user.profile.settings.change-password-settings')}}">{{__('web/users/resources/profile.change_password')}}</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
						<?php /*
						<div class="ui-block-title">
							<a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
							<a href="#" class="items-round-little bg-primary">8</a>
						</div>
						<div class="ui-block-title">
							<a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
						</div>
						<div class="ui-block-title">
							<a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
							<a href="#" class="items-round-little bg-blue">4</a>
						</div>
						*/ ?>
					</div>
					
					<!-- ... end Your Profile  -->
					

				</div>
			</div>
		</div>
	</div>

	<!-- ... end Your Account Personal Information -->
@endsection