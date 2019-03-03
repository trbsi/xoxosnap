<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="stories"></div>
        </div>
    </div>
</div>

<div class="container">
        @if([] !== $videos)
        <div class="row">
            @foreach($videos as $video)
                @component('components.media.video', ['video' => $video])
                @endcomponent
            @endforeach
        </div>
        <div class="row">
            <div class="mx-auto">
                {{$videos->links()}}
            </div>
        </div>
        @else
            PRAZNO
        @endif
</div>

@push('javascript')
    @component('components.media.javascript.stories')
    @endcomponent

    @component('components.media.javascript.progressbar', ['cssClass' => '.progressbar-continer-vid'])
    @endcomponent

    @component('components.media.javascript.generate-video-thumbnails')
    @endcomponent
@endpush