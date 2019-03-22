
<div class="container">
	<div class="row">
		<div class="col col-xl-12">
			<h1>
				{{__('web/home/home.performer.view_your_profile')}} 
				<a href="{{route('user.profile', ['username' => $user->username])}}">{{$user->username}}</a>
			</h1>
		</div>
	</div>
</div>

@if ($user->is_verified)
	@include('web.home.home.home.performer-home-page.upload-media')
@else
	@include('web.home.home.home.performer-home-page.profile-not-verified')
@endif

@include('web.home.home.home.performer-home-page.statistics-earnings-followers')
@include('web.home.home.home.performer-home-page.statistics-twitter-top-paid-videos')