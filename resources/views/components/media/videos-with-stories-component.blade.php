<div class="container viewer-tour-performer-stories">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="stories"></div>
        </div>
    </div>
</div>

<div class="container viewer-tour-performer-videos" id="video-container">
    <div class="infinite-scroll-media">
        <div class="row">
            @if(false === $media->isEmpty())
                @foreach($media as $video)
                    @component('components.media.small-video-component', ['video' => $video])
                    @endcomponent
                @endforeach
                {{$media->links()}}
            @else
                <div class="col col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="text-center">
                        <h1 style="color: #cacbd2">{{__('web/media/media.no_videos')}}</h1>
                        <img src="/img/no-video.png">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@component('components.media.video-popup-component')
@endcomponent

@push('javascript')
@component('components.media.javascript.stories-component', ['stories' => $stories])
@endcomponent

@component('components.media.javascript.progressbar-component', ['cssClass' => '.progressbar-continer-vid'])
@endcomponent

@component('components.media.javascript.infinite-scroll-component')
@endcomponent

@component('components.media.javascript.video-access-component')
@endcomponent
@endpush
