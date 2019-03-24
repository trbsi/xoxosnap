<?php 
use App\Web\Search\Constants\SearchConstants;
?>

<script type="text/javascript">
var globalVideoPlayer = null;
var globalVideoElement = null; <?php //keep variable global so you can access it in video-popup.blade ?>
var globalVideoModalPopup = $('#open-photo-popup-v2');
var globalNewShareUrl;
var globalNewShareTitle;

globalVideoModalPopup.on('hidden.bs.modal', function (e) {
    globalVideoPlayer.destroy();
});

$(document).on('click', '.play-video', function() {
    globalVideoElement = this;

    <?php //if user can access or not ?>
    if (1 === $(this).data('is-locked') && {{$userComposerUserId ?? 0}} !== $(globalVideoElement).data('video-user-id')) {
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
                $(globalVideoElement).data('is-locked', 0);
                $(globalVideoElement).children('img').attr('src', '/img/play.png');
                $('.coins-badge').text(data.coins);
                openVideoModal(globalVideoElement);
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
        openVideoModal(globalVideoElement);
    }
});

function openVideoModal(videoElement)
{
    <?php //prepare popup data ?>
    var videoId = $(videoElement).data('video-id');
    $('#open-photo-popup-v2 #post-author-name').attr('href', $(videoElement).data('profile-url'));
    $('#open-photo-popup-v2 #likes-icon').data('video-id', videoId);

    <?php //if video is liked mark it in popup ?>
    if (1 === $(videoElement).data('liked')) {
        color = '#FF5E3A';
    } else {
        color = '#c2c5d9';
    }
    $('#open-photo-popup-v2 #likes-icon').css({'fill': color, 'color': color});

    <?php //open popup ?>
    var response = ajax('{{route('media.one')}}?id='+videoId, 'GET', {});
    response
    .done(function(data) {
        <?php //sanity check if user manipulates is-locked ?>
        if (false === data.user_paid && {{ $userComposerUserId ?? 0 }} !== data.user_id) {
            alert('No access');
            return;
        }
        var hashtags = data.hashtags;
        var hashtagsHtml = '';
        $.each(hashtags, function( index, value ) {
            hashtagsHtml+='<a href="{{route('search', ['type' => SearchConstants::SEARCH_MEDIA])}}&term='+value.name+'">'+value.hashtag_name+'</a>';
            hashtagsHtml+=' ';
        });

        $('#open-photo-popup-v2 #profile-picture').attr('src', data.user.profile.picture);
        $('#open-photo-popup-v2 #post-author-name').text(data.user.username);
        $('#open-photo-popup-v2 #description').html(data.description);
        $('#open-photo-popup-v2 #views').text(data.views);
        $('#open-photo-popup-v2 #likes').text(data.likes);
        $('#open-photo-popup-v2 #published-ago').text(data.published_ago);
        $('#open-photo-popup-v2 #video-hashtags').html(hashtagsHtml);
        $('#open-photo-popup-v2 #performer-video source').attr('src', data.file);   
        $('#open-photo-popup-v2 #performer-video')[0].load();   
       
        globalNewShareUrl = data.url;
        globalNewShareTitle = data.title;

        <?php //init video ?>
        globalVideoPlayer = new Plyr($("#open-photo-popup-v2 #performer-video"), {}); 

        globalVideoModalPopup.modal('show');      

        <?php //update views ?>
        var response = ajax('{{route('media.update-views')}}', 'POST', {id: $(videoElement).data('video-id')})
        response
        .done(function(data) {
            $('#open-photo-popup-v2 #views').text(data.views); 
        });        
    })
    .fail(function(jqXHR, textStatus, errorThrown) {});
    
    globalVideoModalPopup.on('shown.bs.modal', function (e) {
        $('#open-photo-popup-v2 #description').perfectScrollbar();
    });

}

//https://www.addtoany.com/buttons/customize/events
function onShare(share_data) {
    return {
        url: globalNewShareUrl,
        title: globalNewShareTitle
    };
}

var a2a_config = a2a_config || {};
a2a_config.callbacks = a2a_config.callbacks || [];
a2a_config.callbacks.push({
    share: onShare
});
</script>