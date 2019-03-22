<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="alert alert-warning text-center">
				<h1>
					{{__('web/home/home.performer.profile_not_verified')}} 
				</h1>
				<div class="img-circular mx-auto" style="opacity: 0.6; background-image: url('{{$user->profile->picture}}');">
					<img src="/img/verified.png" style="position: absolute; bottom: 1px; right: 1px;">
				</div>
				<p>
					{{__('web/home/home.performer.upload_stories_videos_verify')}} 
				</p>
			</div>
		</div>
	</div>
</div>