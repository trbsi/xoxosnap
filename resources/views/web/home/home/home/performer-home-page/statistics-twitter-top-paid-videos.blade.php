<div class="container">
	<div class="row">
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="ui-block" data-mh="pie-chart">
				<div class="ui-block-title">
					<div class="h6 title">{{__('web/home/home.performer.twitter_feed')}}</div>
				</div>
				@if($user::PROVIDER_TWITTER === $user->provider)
				<div class="ui-block-content" style="height: 550px;">
					<a class="twitter-timeline" data-height="500" href="https://twitter.com/{{$user->username}}?ref_src=twsrc%5Etfw">Tweets by {{$user->username}}</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
				@else
				<div class="ui-block-content" style="text-align: center;">
					<h5>{{__('web/home/home.performer.cannot_display_twitter_feed')}}</h5>
					<h6>{{__('web/home/home.performer.not_connected_with_twitter_account')}}</h6>
				</div>
				@endif
			</div>
		</div>
		<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
			<div class="ui-block" data-mh="pie-chart">
				<div class="ui-block-title">
					<div class="h6 title">{{__('web/home/home.performer.top_ten_videos_by_earnings')}}</div>
				</div>

				<div class="ui-block-content">
					<ul class="list-group">
					@foreach($mostBoughtVideos as $index => $video)
						<li class="list-group-item">{{++$index}}. NC{{$video->earned_coins}} (${{$video->total_earned_money}}) - {{$video->title}}</li>
					@endforeach
					</ul>
				</div>

			</div>
		</div>
	</div>
</div>