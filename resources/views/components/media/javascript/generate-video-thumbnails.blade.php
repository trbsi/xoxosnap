@if($useScriptTag)
<script type="text/javascript">
@endif
    var video = [];
    var canvas = [];
    var jVideo = [];
    var videoIds = [];

    $(".video-canvas").each(function(i, el) {
        videoIds[i] = $(this).data('video-id'); 
        video[i] = document.getElementById('video'+videoIds[i]);

        (video[i]).onloadeddata  = function() {
            jVideo[i] = $('#video'+videoIds[i]);
            canvas[i] = document.getElementById('canvas'+videoIds[i]); 
            (canvas[i]).getContext('2d').drawImage(video[i], 0, 0, parseInt(jVideo[i].width()), parseInt(jVideo[i].height()));
        };
    });

@if($useScriptTag)
</script>
@endif