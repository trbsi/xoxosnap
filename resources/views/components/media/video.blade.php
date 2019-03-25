<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="ui-block video-item">
        <div class="video-player">
            <div align="center">
                <img src="{{$video->thumbnail}}" class="video-thumbnail">
            </div>
            <a 
                href="javascript:;"
                data-video-id="{{$video->id}}"
                data-video-user-id="{{$video->user_id}}"
                data-profile-url="{{route('user.profile', ['username' => $video->user->username])}}"
                data-is-locked="{{(true === $video->is_locked) ? '1' : '0'}}"
                data-liked="{{(true === $video->user_liked) ? '1' : '0'}}"
                data-coins="{{$video->coins}}"
                class="play-video"
            >
                <!-- svg doesn't work on infinite load -->
                <img src="/img/{{(true === $video->is_locked) ? 'locked.png' : 'play.png'}}">
            </a>
            <div class="overlay overlay-dark"></div>
        </div>
        <div class="ui-block-content video-content">
            @if(null !== $video->expires_at)
            <div class="progressbar-continer-vid" data-current-state="{{$video->progress_bar_current_state}}" data-duration="{{$video->progress_bar_duration}}"></div>
            @endif
            <a href="{{$video->url}}" class="h6 title">{{$video->title}}</a>
            <a href="{{route('user.profile', ['username' => $video->user->username])}}">{{$video->user->username}}</a>
            |
            {{$video->duration}}
            <br>
            <time class="published" datetime="{{$video->created_at}}">{{$video->published_ago}}</time>
            |
            <time class="published">{{$video->views}} {{__('web/home/home.viewer.views')}}</time>
        </div>
    </div>
</div>