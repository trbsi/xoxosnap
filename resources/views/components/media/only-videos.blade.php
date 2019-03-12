<div class="container" id="video-container">
    <div class="infinite-scroll-media">
        <div class="row">
            @if(false === $media->isEmpty())
                @foreach($media as $video)
                    @component('components.media.video', ['video' => $video])
                    @endcomponent
                @endforeach
              {{$media->appends(request()->except('page'))->links()}}
            @endif
        </div>
    </div>
</div>

@component('components.media.video-popup')
@endcomponent

@push('javascript')
    @component('components.media.javascript.progressbar', ['cssClass' => '.progressbar-continer-vid'])
    @endcomponent

    @component('components.media.javascript.infinite-scroll')
    @endcomponent

    @component('components.media.javascript.video-access')
    @endcomponent    
@endpush

@push('css')
<style type="text/css">
    video {
        pointer-events: none;
    }
    video::-webkit-media-controls {
      display: none;
    }

    video::-webkit-media-controls-play-button {}

    video::-webkit-media-controls-volume-slider {}

    video::-webkit-media-controls-mute-button {}

    video::-webkit-media-controls-timeline {}

    video::-webkit-media-controls-current-time-display {}
</style>
@endpush