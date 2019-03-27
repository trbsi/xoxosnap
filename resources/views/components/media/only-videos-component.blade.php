<div class="container" id="video-container">
    <div class="infinite-scroll-media">
        <div class="row">
            @if(false === $media->isEmpty())
                @foreach($media as $video)
                    @component('components.media.small-video-component', ['video' => $video])
                    @endcomponent
                @endforeach
              {{$media->appends(request()->except('page'))->links()}}
            @endif
        </div>
    </div>
</div>

@component('components.media.video-popup-component')
@endcomponent

@push('javascript')
    @component('components.media.javascript.progressbar-component', ['cssClass' => '.progressbar-continer-vid'])
    @endcomponent

    @component('components.media.javascript.infinite-scroll-component')
    @endcomponent

    @component('components.media.javascript.video-access-component')
    @endcomponent    
@endpush