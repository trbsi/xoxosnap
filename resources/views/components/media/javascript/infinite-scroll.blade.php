<script type="text/javascript">
    //infinite scroll
    $('#video-container ul.pagination').hide();
    $(function() {
        $('.infinite-scroll-media').jscroll({
            autoTrigger: true,
            loadingHtml: '<div style="text-align:center;"><img src="/img/loading_videos.gif" alt="Loading..." /></div>',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll-media',
            callback: function() {
                $('#video-container ul.pagination').remove();
            }
        });
    });
</script>