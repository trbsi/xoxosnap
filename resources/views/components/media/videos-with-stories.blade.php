<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="stories"></div>
        </div>
    </div>
</div>

<div class="container" id="video-container">
    <div class="infinite-scroll-media">
        <div class="row">
            @if(false === $media->isEmpty())
                @foreach($media as $video)
                    @component('components.media.small-video', ['video' => $video])
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

@component('components.media.video-popup')
@endcomponent

@push('javascript')
    @component('components.media.javascript.stories', ['stories' => $stories])
    @endcomponent

    @component('components.media.javascript.progressbar', ['cssClass' => '.progressbar-continer-vid'])
    @endcomponent

    @component('components.media.javascript.infinite-scroll')
    @endcomponent

    @component('components.media.javascript.video-access')
    @endcomponent    
@endpush
