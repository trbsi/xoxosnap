<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
    <div class="ui-block video-item">
        <div class="video-player">
            <div align="center" class="embed-responsive embed-responsive-16by9" style="z-index: -50; position: absolute;">
                <video id="video{{$video->id}}" class="embed-responsive-item" controls preload="auto">
                    <source src="{{$video->file}}" type="video/mp4">
                </video>
            </div>
            <canvas id="canvas{{$video->id}}" class="video-canvas" data-video-id="{{$video->id}}"></canvas>
            <a data-toggle="modal" data-target="#open-photo-popup-v2" class="play-video">
                <svg class="{{($video->cost > 0) ? 'olymp-locked' : 'olymp-play-icon'}}">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#{{($video->cost > 0) ? 'olymp-locked' : 'olymp-play-icon'}}"></use>
                </svg>
            </a>
            <div class="overlay overlay-dark"></div>
        </div>
        <div class="ui-block-content video-content">
            @if(null !== $video->expires_at)
            <div class="progressbar-continer-vid" data-current-state="{{$video->progress_bar_current_state}}" data-duration="{{$video->progress_bar_duration}}"></div>
            @endif
            <a href="#" class="h6 title">{{$video->title}}</a>
            <time class="published" datetime="{{$video->created_at}}">{{$video->published_ago}}</time>
        </div>
    </div>
</div>

@component('components.media.video-popup')
@endcomponent
