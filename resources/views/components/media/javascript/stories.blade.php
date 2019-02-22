<script>
    var initDemo = function () {     
      skin = 'Snapgram';
      var skins = {
        'Snapgram': {
          'avatars': true,
          'list': false,
          'autoFullScreen': false,
          'cubeEffect': true
        }
      };
    
      var timeIndex = 0;
      var shifts = [35, 60, 60 * 3, 60 * 60 * 2, 60 * 60 * 25, 60 * 60 * 24 * 4, 60 * 60 * 24 * 10];
      var timestamp = function () {
        var now = new Date();
        var shift = shifts[timeIndex++] || 0;
        var date = new Date(now - shift * 1000);
    
        return date.getTime() / 1000;
      };
    
      new Zuck('stories', {
        backNative: true,
        previousTap: true,
        autoFullScreen: skins[skin]['autoFullScreen'],
        skin: skin,
        avatars: skins[skin]['avatars'],
        list: skins[skin]['list'],
        cubeEffect: skins[skin]['cubeEffect'],
        localStorage: true,
        stories: [
          {
            id: "ramon",
            photo: "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/users/1.jpg",
            name: "Ramon",
            link: "https://ramon.codes",
            lastUpdated: timestamp(),
            items: [
              Zuck.buildItem("ramon-1", "photo", 3, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/1.jpg", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/1.jpg", '', false, false, timestamp()),
              Zuck.buildItem("ramon-2", "video", 0, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/2.mp4", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/2.jpg", '', false, false, timestamp()),
              Zuck.buildItem("ramon-3", "photo", 3, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/3.png", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/3.png", 'https://ramon.codes', 'Visit my Portfolio', false, timestamp())
            ]
          },
          {
            id: "gorillaz",
            photo: "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/users/2.jpg",
            name: "Gorillaz",
            link: "",
            lastUpdated: timestamp(),
            items: [
              Zuck.buildItem("gorillaz-1", "video", 0, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/4.mp4", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/4.jpg", '', false, false, timestamp()),
              Zuck.buildItem("gorillaz-2", "photo", 3, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/5.jpg", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/5.jpg", '', false, false, timestamp()),
            ]
          },
          {
            id: "ladygaga",
            photo: "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/users/3.jpg",
            name: "Lady Gaga",
            link: "",
            lastUpdated: timestamp(),
            items: [
              Zuck.buildItem("ladygaga-1", "photo", 5, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/6.jpg", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/6.jpg", '', false, false, timestamp()),
              Zuck.buildItem("ladygaga-2", "photo", 3, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/7.jpg", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/7.jpg", 'http://ladygaga.com', false, false, timestamp()),
            ]
          },
          {
            id: "starboy",
            photo: "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/users/4.jpg",
            name: "The Weeknd",
            link: "",
            lastUpdated: timestamp(),
            items: [
              Zuck.buildItem("starboy-1", "photo", 5, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/8.jpg", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/8.jpg", '', false, false, timestamp())
            ]
          },
          {
            id: "riversquomo",
            photo: "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/users/5.jpg",
            name: "Rivers Cuomo",
            link: "",
            lastUpdated: timestamp(),
            items: [
              Zuck.buildItem("riverscuomo", "photo", 10, "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/9.jpg", "https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/9.jpg", '', false, false, timestamp())
            ]
          }
        ],
         callbacks:  {
            'onOpen': function(storyId, callback) {
              alert(storyId);  // on open story viewer
              callback();
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
    
    initDemo();
</script>