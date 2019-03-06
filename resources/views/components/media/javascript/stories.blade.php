<script>
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

      var buildedStories = buildStories();

      var loadedStories = new Zuck('stories', {
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
                var locked = false;
                var storyIndex = null;

                $.each(buildedStories, function(index, story) {
                    if (storyId == story.id && true === story.isLocked) {
                        locked = story.isLocked;
                        storyIndex = index;
                    }
                });

                if (false === locked) {
                    callback();
                } else {
                    storyIsLocked(callback, storyId, storyIndex, buildedStories);
                }
            },

            'onRender': function(item, mediaHTML) {
                return mediaHTML; // on render story viewer, use if you want custom elements
            },

            'onView': function(storyId) {
                // on view story
            },

            'onEnd': function(storyId, callback) {
                callback();  // on end story
            },

            'onClose': function(storyId, callback) {
                callback();  // on close story viewer
            },

            'onNavigateItem': function(storyId, nextStoryId, callback) {
                callback();  // on navigate item of story
            },
          },
      });
  
    };
    
    initStories();
    $('#stories').perfectScrollbar({wheelPropagation:false});

    function buildStories()
    {
        var storiesJson = {!! $stories !!}; 
        var stories = [];
        var timestamp = function (shift) {
            var now = new Date();
            var date = new Date(now - shift * 1000);

            return date.getTime() / 1000;
          };

        $.each(storiesJson, function(index, story) {
            itemsArray = [];
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
                items: itemsArray
            };

            stories.push(storyObject);
        });

        return stories;
    }

    function storyIsLocked(storyCallback, storyId, storyIndex, buildedStories, coins)
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
                var response = ajax('{{route('coins.purchase', ['type' => 'story'])}}', 'PATCH', {id: storyId});
                response
                .done(function(data) {
                    <?php  //unlock story ?>
                    buildedStories[storyIndex].isLocked = false;
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
                        console.log(resultBuyCoins);
                        if (true === resultBuyCoins.value) {
                            window.location = '{{route('coins.get')}}';
                        }
                    });
                });
               
            }
        });
    }
</script>