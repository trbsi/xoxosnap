<script type="text/javascript">
    var videoPlayer = null;
    var videoElement = null; <?php //keep variable global so you can access it in video-popup.blade ?>
    $('#open-photo-popup-v2').on('hidden.bs.modal', function (e) {
        videoPlayer.destroy();
    });

    $('.play-video').click(function() {
        videoElement = this;
        //if user can access or not
        if (1 === $(this).data('is-locked')) {
            <?php //ask if wants to buy access ?>
            Swal.fire({
              type: 'question',
              showCancelButton: true,
              title: '{{__('web/home/home.viewer.video_is_locked')}}',
              html: '{{__('web/home/home.viewer.pay_to_access')}}<br><b>{{__('web/home/home.viewer.amount')}}</b> '+$(this).data('coins')+' {{__('web/home/home.viewer.coins')}}',
            }).then((result) => {
              if (true === result.value) {
                <?php  //take coins from user ?>
                var response = ajax('{{route('coins.purchase', ['type' => 'video'])}}', 'PATCH', {id: $(this).data('video-id')});
                response
                .done(function(data) {
                    $('#views').text(data.views); 
                    $(videoElement).data('is-locked', 0);
                    $(videoElement).children('img').attr('src', '/img/play.png');
                    openModal(videoElement);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    response = jqXHR.responseJSON;
                    Swal.fire({
                      title: response.message,
                      html: '{{__('web/coins/coins.update.buy_coins')}}',
                      type: 'warning',
                      showCancelButton: true,
                    })
                    .then((resultBuyCoins) => {
                        console.log(resultBuyCoins);
                        if (true === resultBuyCoins.value) {
                            window.location = '{{route('coins.get')}}';
                        }
                    });
                });
              }
            });
        } else {
            openModal(videoElement);
        }
    });

    function openModal(videoElement)
    {
        <?php //prepare popup data ?>
        $('#performer-video source').attr('src', $(videoElement).data('video-url'));
        $('#post-author-name').attr('href', $(videoElement).data('profile-url'));
        $('#post-author-name').text($(videoElement).data('username'));
        $('#profile-picture').attr('src', $(videoElement).data('profile-picture'));
        $('#description').html($(videoElement).data('description'));
        $('#published-ago').text($(videoElement).data('published-ago'));
        $('#views').text($(videoElement).data('views'));
        $('#likes').text($(videoElement).data('likes'));
        $('#likes-icon').data('video-id', $(videoElement).data('video-id'));
        $('#performer-video')[0].load();

        <?php //if video is liked mark it in popup ?>
        if (1 === $(videoElement).data('liked')) {
            color = '#FF5E3A';
        } else {
            color = '#c2c5d9';
        }
        $('#likes-icon').css({'fill': color, 'color': color});

        <?php //init video ?>
        videoPlayer = new Plyr($("#performer-video"), {}); 

        <?php //open popup ?>
        $('#open-photo-popup-v2').modal('show');

        <?php //update views ?>
        var response = ajax('{{route('media.update-views')}}', 'POST', {id: $(videoElement).data('video-id')})
        response
        .done(function(data) {
            $('#views').text(data.views); 
        });
    }
</script>