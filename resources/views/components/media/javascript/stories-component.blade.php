<script>
    var arrayOfStories = buildStories();
    var buildedStories = arrayOfStories.stories;
    var storiesWithCustomKey = arrayOfStories.storiesWithCustomKey;

    var initStories = function () {     
      skin = 'Snapgram';
      var skins = {
        'Snapgram': {
          'avatars': true,
          'list': false,
          'autoFullScreen': false,
          'cubeEffect': true
        }
      };

      var loadedStories = new Zuck('stories', {
        touchMoveEnabled: true,
        moveToNextStoryAutomatically: true,
        backNative: true,
        previousTap: true,
        autoFullScreen: skins[skin]['autoFullScreen'],
        skin: skin,
        avatars: skins[skin]['avatars'],
        list: skins[skin]['list'],
        cubeEffect: skins[skin]['cubeEffect'],
        localStorage: true,
        stories: buildedStories,
         callbacks:  {
            'onOpen': function(storyId, callback) {
                var result = findStory(storyId);
                if (false === result['locked']) {
                    callback();
                } else {
                    storyIsLocked(callback, storyId, result['storyIndex']);
                }
            },

            'onRender': function(storyId, item, mediaHTML) {
                var story = storiesWithCustomKey['story'+storyId];
                <?php //display number of views per story ?>
                mediaHTML+= '<div style="position:absolute; bottom: 10px; left: 10px;"><img style="max-width: 20px;" src="/img/eye_white.png"> '+story.views+'</div>';
                return mediaHTML; // on render story viewer, use if you want custom elements
            },

            'onView': function(storyId) {
                saveViewedStoryIds(storyId);
            },

            'onEnd': function(storyId, callback) {
                callback();  // on end story
            },

            'onClose': function(storyId, callback) {
                updateStoriesViews();
                callback();  // on close story viewer
            },

            'onNavigateItem': function(storyId, nextStoryId, callback) {
                callback();
            },
          },
      });
  
    };
    
    initStories();

    <?php //how through each story and add class that will add icon representing that story is locked?>
    $("div.story").each(function(index) {
        var id = $(this).data('id');
        var story = storiesWithCustomKey['story'+id];
        if (story.isLocked) {
            $(this).find('.img').addClass('story-locked');
        }
    });

    //init perfect scrollbar
    $('#stories').perfectScrollbar({wheelPropagation:false});

    function buildStories()
    {
        var storiesJson = {!! $stories !!}; 
        var stories = [];
        var storiesWithCustomKey = [];
        var timestamp = function (shift) {
            var now = new Date();
            var date = new Date(now - shift * 1000);

            return date.getTime() / 1000;
          };

        $.each(storiesJson, function(index, story) {
            var itemsArray = [];
            $.each(story.items, function(i, item) {
                itemsArray.push(Zuck.buildItem(
                    item.story_id,
                    item.media_type,
                    item.duration,
                    item.media_file,
                    item.preview,
                    '',
                    false,
                    false,
                    timestamp(item.last_updated_at)
                ));
            });

            storyObject = {
                id: story.id,
                photo: story.photo,
                name: story.name,
                link: story.link,
                isLocked: story.is_locked,
                coins: story.coins,
                lastUpdated: timestamp(story.last_updated_at),
                views: story.views,
                items: itemsArray
            };

            storiesWithCustomKey['story'+story.id] = storyObject;
            stories.push(storyObject);
        });

        return {stories: stories, storiesWithCustomKey: storiesWithCustomKey};
    }

    function storyIsLocked(storyCallback, storyId, storyIndex)
    {
        Swal.fire({
            type: 'question',
            title: '{{__('web/home/home.viewer.story_is_locked')}}',
            html: '{{__('web/home/home.viewer.pay_to_access')}}<br><b>{{__('web/home/home.viewer.amount')}}</b> '
            +buildedStories[storyIndex].coins
            +' {{__('web/home/home.viewer.coins')}}',
            showCancelButton: true,
        })
        .then((result) => {
            if (true === result.value) {
                <?php //send request to server ?>
                var response = ajax('{{route('coins.purchase-media', ['type' => 'story'])}}', 'PATCH', {id: storyId});
                response
                .done(function(data) {
                    <?php  //unlock story ?>
                    buildedStories[storyIndex].isLocked = false;
                    <?php //remove locked icon from it ?>
                    $("div.story[data-id='"+storyId+"']").find('.img').removeClass('story-locked'); 
                    <?php //update coins in header ?>
                    $('.coins-badge').text(data.coins);
                    <?php //open story ?>
                    storyCallback();
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
                            window.location = '{{route('coins.show-buy-coins-form')}}';
                        }
                    });
                });
               
            }
        });
    }

    function findStory(storyId)
    {
        var locked = false;
        var storyIndex = null;

        $.each(buildedStories, function(index, story) {
            if (storyId == story.id && true === story.isLocked) {
                locked = story.isLocked;
                storyIndex = index;
            }
        });

        var result = [];
        result['locked'] = locked;
        result['storyIndex'] = storyIndex;
        return result;
    }

    function saveViewedStoryIds(storyId)
    {
        var viewedStoryIds = JSON.parse(localStorage.getItem('viewedStoryIds'));
        if (null === viewedStoryIds) {
            viewedStoryIds = [];
        }
        viewedStoryIds.push(storyId);
        localStorage.setItem('viewedStoryIds', JSON.stringify(viewedStoryIds));
    }

    function updateStoriesViews()
    {
        var viewedStoryIds = JSON.parse(localStorage.getItem('viewedStoryIds'));
        ajax('{{route('story.update-views')}}', 'POST', {ids: viewedStoryIds});
        localStorage.removeItem('viewedStoryIds');
    }
</script>