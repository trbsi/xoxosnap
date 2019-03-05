<script type="text/javascript">
    //infinite scroll
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<div style="text-align:center;"><img src="/img/loading_videos.gif" alt="Loading..." /></div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
                @component('components.media.javascript.init-plyr', ['useScriptTag' => false])
                @endcomponent
            }
        });
    });
</script>