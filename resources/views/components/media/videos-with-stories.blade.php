<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="stories"></div>
        </div>
    </div>
</div>

<div class="container">
        @if([] !== $videos)
        <div class="infinite-scroll">
            <div class="row">
                
                @foreach($videos as $video)
                    @component('components.media.video', ['video' => $video])
                    @endcomponent
                @endforeach
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

    @component('components.media.javascript.generate-video-thumbnails', ['useScriptTag' => true])
    @endcomponent
    <script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<div style="text-align:center;"><img src="/img/loading.gif" alt="Loading..." /></div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
                @component('components.media.javascript.generate-video-thumbnails', ['useScriptTag' => false])
                @endcomponent
            }
        });
    });
</script>
@endpush