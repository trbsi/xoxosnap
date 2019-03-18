
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

@include('web.home.home.home.performer-home-page.upload-media')
@include('web.home.home.home.performer-home-page.statistics-earnings-followers')
@include('web.home.home.home.performer-home-page.statistics-twitter-top-paid-videos')