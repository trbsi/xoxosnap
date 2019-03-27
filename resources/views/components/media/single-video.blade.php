<?php 
	use App\Web\Search\Constants\SearchConstants;
?>
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Features Video -->
            <div class="ui-block features-video">
                <div class="video-player">
					<img src="{{$media->thumbnail}}" alt="photo">
                    <a href="javascript:;" class="play-video">
						<svg class="olymp-locked" style="{{(false === $media->is_locked) ? 'display:none' : ''}}">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-locked"></use>
                        </svg>
                        <svg class="olymp-play-icon" style="{{(true === $media->is_locked) ? 'display:none' : ''}}">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                    </a>
                    <div class="video-content">
                        <div class="h4 title">{{$media->title}}</div>
                        <time class="published" datetime="2017-03-24T18:18">{{$media->duration}}</time>
                    </div>
                    <div class="overlay"></div>
                </div>
                <div class="features-video-content">
                    <article class="hentry post">
                        <div class="post__author author vcard inline-items">
							<a href="{{$media->user->profile_url}}">
                            	<img src="{{$media->user->profile->picture}}" alt="author">
							</a>
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="{{$media->user->profile_url}}">{{$media->user->username}}</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                    {{$media->published_ago}}
                                    </time>
                                </div>
                            </div>
                            @if ($userComposerUserId === $media->user_id)
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">{{__('web/users/resources/profile.single_video.delete')}}</a>
                                    </li>
                                    <li>
                                        <a href="#">{{__('web/users/resources/profile.single_video.edit')}}</a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                        <p>
                            @foreach ($media->hashtags as $hashtag)
                            <a href="{{route('search', ['type' => SearchConstants::SEARCH_MEDIA, 'term' => $hashtag->name])}}">#{{$hashtag->name}}</a>
                            @endforeach
                        </p>
                        <div id="media-description">{{$media->description}}</div>
                        <div class="post-additional-info inline-items">
							<img src="/img/loading_circle.gif" style="display: none;" id="likes-loading">
                            <a href="javascript:;" id="likes-icon" class="post-add-icon inline-items" data-video-id="{{$media->id}}" style="{{(true === $media->liked) ? 'fill: #c2c5d9; color: #c2c5d9' : ''}}">
                                <svg class="olymp-heart-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                </svg>
                                <span>{{$media->likes}}</span>
                            </a>
                            <div class="comments-shared">
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-icon-eye">
                                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-icon-eye"></use>
                                    </svg>
                                    <span id="views">{{$media->views}}</span>
                                </a>
                            </div>
                        </div>
                        <div class="control-block-button post-control-button">
                            <?php /*
                                <a href="#" class="btn btn-control">
                                	<svg class="olymp-like-post-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg>
                                </a>
                                
                                <a href="#" class="btn btn-control">
                                	<svg class="olymp-comments-post-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </a>
                                */ ?>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="{{$media->url}}" data-a2a-title="{{$media->title}}">
                                <a href="#" class="a2a_dd btn btn-control">
                                    <svg class="olymp-share-icon">
                                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php /*
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                        
                        	<ul class="comments-list">
                        		<li class="comment-item">
                        			<div class="post__author author vcard inline-items">
                        				<img src="img/avatar48-sm.jpg" alt="author">
                        
                        				<div class="author-date">
                        					<a class="h6 post__author-name fn" href="#">Marina Valentine</a>
                        					<div class="post__date">
                        						<time class="published" datetime="2017-03-24T18:18">
                        							46 mins ago
                        						</time>
                        					</div>
                        				</div>
                        
                        				<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                        
                        			</div>
                        
                        			<p>I had a great time too!! We should do it again!</p>
                        
                        			<a href="#" class="post-add-icon inline-items">
                        				<svg class="olymp-heart-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                        				<span>8</span>
                        			</a>
                        			<a href="#" class="reply">Reply</a>
                        		</li>
                        
                        		<li class="comment-item">
                        			<div class="post__author author vcard inline-items">
                        				<img src="img/avatar4-sm.jpg" alt="author">
                        
                        				<div class="author-date">
                        					<a class="h6 post__author-name fn" href="#">Chris Greyson</a>
                        					<div class="post__date">
                        						<time class="published" datetime="2017-03-24T18:18">
                        							1 hour ago
                        						</time>
                        					</div>
                        				</div>
                        
                        				<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                        
                        			</div>
                        
                        			<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        
                        			<a href="#" class="post-add-icon inline-items">
                        				<svg class="olymp-heart-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                        				<span>7</span>
                        			</a>
                        			<a href="#" class="reply">Reply</a>
                        
                        		</li>
                        	</ul>
                        
                        </div>
                        
                        <form class="comment-form inline-items">
                        
                        	<div class="post__author author vcard inline-items">
                        		<img src="img/avatar73-sm.jpg" alt="author">
                        
                        		<div class="form-group with-icon-right ">
                        			<textarea class="form-control" placeholder="Press Enter to post..."></textarea>
                        			<div class="add-options-message">
                        				<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                        					<svg class="olymp-camera-icon"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                        				</a>
                        			</div>
                        		</div>
                        	</div>
                        
                        </form>
                        */?>
                </div>
            </div>
            <!-- ... end Features Video -->
        </div>
    </div>
</div>

@push('javascript')
    @component('components.media.javascript.like-media')
    @endcomponent

	<script>
		$('#media-description').perfectScrollbar();
		var globalVideoPlayer;
		var mediaDialog;

		$('.features-video .play-video').click(function() {
			var response = ajax('{{route('media.one', ['id' => $media->id])}}', 'GET', {});
			response
			.done(function(data) {
				var mediaData = data;
				if (true === data.is_locked) {
					<?php //ask if wants to buy access ?>
					Swal.fire({
						type: 'question',
						showCancelButton: true,
						title: '{{__('web/home/home.viewer.video_is_locked')}}',
						html: '{{__('web/home/home.viewer.pay_to_access')}}<br><b>{{__('web/home/home.viewer.amount')}}</b> {{$media->coins}} {{__('web/home/home.viewer.coins')}}',
					}).then((result) => {
						if (true === result.value) {
							buySingleMedia(mediaData);
						}
					});
				} else {
					displayMedia(data.file);
				}
			})
			.fail(function(xhr) {
				if (401 === xhr.status) {
					Swal.fire({
						type: 'warning',
						title: xhr.statusText,
						html: '{{__('web/users/resources/profile.single_video.login_to_view_video')}}',
					});
				}
			});
		});		

		function displayMedia(file)
		{
			mediaDialog = bootbox.dialog({
				message: '<br>'
						+'<video id="performer-video" preload="auto">'
							+'<source type="video/mp4">'
						+'</video>',
				size: 'large',
				onEscape: true,
			});

			mediaDialog.on('shown.bs.modal', function(e){
				$('#performer-video source').attr('src', file)
				globalVideoPlayer = new Plyr($("#performer-video"), {});
			});	

			mediaDialog.on('hidden.bs.modal', function(e){
				globalVideoPlayer.destroy();
			});

            <?php //update views ?>
            var response = ajax('{{route('media.update-views')}}', 'POST', {id: {{$media->id}}})
            response
			.done(function(data) {
				$('.features-video #views').text(data.views);
			});

        }

		function buySingleMedia(mediaData)
		{
			<?php  //take coins from user ?>
			var response = ajax('{{route('coins.purchase-media', ['type' => 'video'])}}', 'PATCH', {id: {{$media->id}}});
			response
			.done(function(coinsData) {
				$('.coins-badge').text(coinsData.coins);
				$('.features-video .olymp-locked').hide();
				$('.features-video .olymp-play-icon').show();
				displayMedia(mediaData.file);
			})
			.fail(function(jqXHR, textStatus, errorThrown) {
				response = jqXHR.responseJSON;
				Swal.fire({
					title: response.message,
					html: '{{__('web/coins/coins.update.buy_coins')}}',
					type: 'warning',
					showCancelButton: true,
				})
				.then((resultBuyCoins) => {
					if (true === resultBuyCoins.value) {
						window.location = '{{route('coins.get')}}';
					}
				});
			});
		}
	</script>
@endpush