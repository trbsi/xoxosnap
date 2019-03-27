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
                $(this).find('.progressbar-continer-vid').each(function( index ) {
                    var bar = new ProgressBar.Circle(this, {
                        strokeWidth: 10,
                        easing: 'easeInOut',
                        duration: $(this).data('duration')*1000,
                        color: '#FF5E3A',
                        trailColor: '#2C2C2C',
                        trailWidth: 1,
                        svgStyle: null
                    });

                    bar.set($(this).data('current-state'))
                    bar.animate(0);
                }); 
            }
        });
    });
</script>