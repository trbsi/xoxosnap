<script type="text/javascript">
    var likesIcon = $('#likes-icon');
    var globalVideoElement = globalVideoElement || $('.play-video');

    likesIcon.click(function () {
        var likesLoading = $('#likes-loading');
        likesLoading.show();
        likesIcon.hide();

        var response = ajax('{{route('api.media.like')}}', 'POST', {id: $(this).data('video-id')})
        response
            .done(function (data) {
                likesLoading.hide();
                likesIcon.show();
                $('#likes-count').text(data.likes);
                if (true === data.liked) {
                    $(globalVideoElement).data('liked', 1);
                    color = '#FF5E3A';
                } else {
                    $(globalVideoElement).data('liked', 0);
                    color = '#c2c5d9';
                }
                $('#likes-icon').css({'fill': color, 'color': color});

            })
            .fail(function (xhr) {
                likesLoading.hide();
                likesIcon.show();
            });
    });

</script>