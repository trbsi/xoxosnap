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
            @if(false === $videos->isEmpty())
            @foreach($videos as $video)
                @component('components.media.video', ['video' => $video])
                @endcomponent
            @endforeach
              {{$videos->links()}}
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

    @component('components.media.javascript.init-plyr', ['useScriptTag' => true])
    @endcomponent

    @component('components.media.javascript.infinite-scroll')
    @endcomponent

    @component('components.media.javascript.video-access')
    @endcomponent    
@endpush