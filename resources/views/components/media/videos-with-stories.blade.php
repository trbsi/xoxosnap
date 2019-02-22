<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="stories"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php for($i=0;$i<6;$i++):?>
            @component('components.media.video')
            @endcomponent
        <?php endfor; ?>
    </div>
</div>
@component('components.media.load-more')
@endcomponent

@push('javascript')
    @component('components.media.javascript.stories')
    @endcomponent

    @component('components.media.javascript.progressbar', ['cssClass' => '.progressbar-continer-vid'])
    @endcomponent
@endpush