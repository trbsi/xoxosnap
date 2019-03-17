
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


<div class="container">
    <div class="row">
        <!-- Main Content -->
        <main class="col col-xl-12 order-xl-12 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <!-- News Feed Form  -->
                <div class="news-feed-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active inline-items" data-toggle="tab" href="#video" role="tab" aria-expanded="true">

                                <span>{{__('web/home/home.performer.add_video')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inline-items" data-toggle="tab" href="#story" role="tab" aria-expanded="false">
                                <span>{{__('web/home/home.performer.add_story')}}</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="video" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="form-group with-icon label-floating is-empty">
                                    <textarea class="form-control" placeholder=""  ></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                                        </svg>
                                    </a>
                                    <button class="btn btn-primary btn-md-2">{{__('web/home/home.performer.upload_video')}}</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="story" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="form-group with-icon label-floating is-empty">
                                    <textarea class="form-control" placeholder=""  ></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                        <svg class="olymp-computer-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                        </svg>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                        <svg class="olymp-small-pin-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                                        </svg>
                                    </a>
                                    <button class="btn btn-primary btn-md-2">{{__('web/home/home.performer.upload_story')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ... end News Feed Form  -->			
            </div>
        </main>
        <!-- ... end Main Content -->
    </div>
</div>


<div class="container">
	<div class="row">
		<div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									{{__('web/home/home.performer.current_earnings')}}
								</span>
							</div>
							<div class="count-stat">
								<div>NC{{$currentCoins}} <span class="indicator positive"> {{__('general/site.coins')}}</span></div>
								<div>${{$currentMoney}} <span class="indicator positive"> {{__('general/site.dollars')}}</span></div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									{{__('web/home/home.performer.total_earnings')}}
								</span>
							</div>
							<div class="count-stat">
								<div>NC{{$totalCoins}} <span class="indicator positive"> {{__('general/site.coins')}}</span></div>
								<div>${{$totalMoney}} <span class="indicator positive"> {{__('general/site.dollars')}}</span></div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col col-xl-4 order-xl-4 col-lg-6 order-lg-4 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-content">
					<ul class="statistics-list-count">
						<li>
							<div class="points">
								<span>
									{{__('web/home/home.performer.followers')}}
								</span>
							</div>
							<div class="count-stat">
								{{$followersCount}}
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

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
