<?php 
use App\Web\Search\Constants\SearchConstants;
?>

<script type="text/javascript">
    var videoPlayer = null;
    var videoElement = null; <?php //keep variable global so you can access it in video-popup.blade ?>
    var modalPopup = $('#open-photo-popup-v2');

    modalPopup.on('hidden.bs.modal', function (e) {
        videoPlayer.destroy();
    });

    $(document).on('click', '.play-video', function() {
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
                    $('.coins-badge').text(data.coins);
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
        var hashtags = $(videoElement).data('hashtags');
        var hashtagsHtml = '';
        $.each(hashtags, function( index, value ) {
            hashtagsHtml+='<a href="{{route('search', ['type' => SearchConstants::SEARCH_MEDIA])}}&term='+value.name+'">'+value.hashtag_name+'</a>';
            hashtagsHtml+=' ';
        });

        <?php //prepare popup data ?>
        $('#open-photo-popup-v2 #performer-video source').attr('src', $(videoElement).data('video-url'));
        $('#open-photo-popup-v2 #post-author-name').attr('href', $(videoElement).data('profile-url'));
        $('#open-photo-popup-v2 #post-author-name').text($(videoElement).data('username'));
        $('#open-photo-popup-v2 #profile-picture').attr('src', $(videoElement).data('profile-picture'));
        $('#open-photo-popup-v2 #description').html($(videoElement).data('description'));
        $('#open-photo-popup-v2 #published-ago').text($(videoElement).data('published-ago'));
        $('#open-photo-popup-v2 #views').text($(videoElement).data('views'));
        $('#open-photo-popup-v2 #likes').text($(videoElement).data('likes'));
        $('#open-photo-popup-v2 #likes-icon').data('video-id', $(videoElement).data('video-id'));
        $('#open-photo-popup-v2 #video-hashtags').html(hashtagsHtml);
        $('#open-photo-popup-v2 #performer-video')[0].load();

        <?php //if video is liked mark it in popup ?>
        if (1 === $(videoElement).data('liked')) {
            color = '#FF5E3A';
        } else {
            color = '#c2c5d9';
        }
        $('#open-photo-popup-v2 #likes-icon').css({'fill': color, 'color': color});

        <?php //init video ?>
        videoPlayer = new Plyr($("#open-photo-popup-v2 #performer-video"), {}); 

        <?php //open popup ?>
        modalPopup.modal('show');

        <?php //update views ?>
        var response = ajax('{{route('media.update-views')}}', 'POST', {id: $(videoElement).data('video-id')})
        response
        .done(function(data) {
            $('#open-photo-popup-v2 #views').text(data.views); 
        });        

        modalPopup.on('shown.bs.modal', function (e) {
            $('#open-photo-popup-v2 #description').perfectScrollbar();
        });

    }
</script>