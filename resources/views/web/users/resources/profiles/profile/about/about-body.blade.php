<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">{{__('web/users/resources/profile.about_me')}}</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- W-Personal-Info -->
					
					<ul class="widget w-personal-info">
						<li>
							<span class="title">{{__('web/users/resources/profile.about_me')}}:</span>
							<span class="text">{{$user->profile->description}}</span>
						</li>
						<li>
							<span class="title">{{__('web/users/resources/profile.birthday')}}:</span>
							<span class="text">{{$user->profile->birthday}}</span>
						</li>
						<li>
							<span class="title">{{__('web/users/resources/profile.current_city')}}:</span>
							<span class="text">{{$user->profile->current_city}}</span>
						</li>
						<li>
							<span class="title">{{__('web/users/resources/profile.gender')}}:</span>
							<span class="text">{{$user->profile->gender}}</span>
						</li>
						<li>
							<span class="title">{{__('web/users/resources/profile.business_email')}}:</span>
							<span class="text">{{str_replace('@', '(at)', $user->profile->business_email)}}</span>
						</li>
						<li>
							<span class="title">{{__('web/users/resources/profile.website')}}:</span>
							<span class="text">
								@if(false === empty($user->profile->website))
								<a href="{{$user->profile->website}}">{{$user->profile->website}}</a>
								@else
								-
								@endif
							</span>
						</li>
					</ul>
					
					<!-- ... end W-Personal-Info -->
					<!-- W-Socials -->
					
					<div class="widget w-socials">
						<h6 class="title">{{__('web/users/resources/profile.other_social_networks')}}:</h6>
						@if(false === empty($user->profile->facebook))
						<a href="{{$user->profile->facebook}}" class="social-item bg-facebook" target="_blank">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
							Facebook
						</a>
						@endif

						@if(false === empty($user->profile->twitter))
						<a href="{{$user->profile->twitter}}" class="social-item bg-twitter" target="_blank">
							<i class="fab fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						@endif

						@if(false === empty($user->profile->instagram))
						<a href="{{$user->profile->instagram}}" class="social-item bg-purple" target="_blank">
							<i class="fab fa-instagram" aria-hidden="true"></i>
							Instagram
						</a>
						@endif
					</div>
					
					
					<!-- ... end W-Socials -->
				</div>
			</div>
		</div>
	</div>
</div>
