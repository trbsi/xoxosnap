<script>
(function() {

    function init() {
        @if(true === $user->is_verified)
            var tourUserIsVerified = window.localStorage.getItem('tour-performer-is-verified');
            if (null === tourUserIsVerified || false === tourUserIsVerified) {
                const shepherdTour = setupShepherd();
                shepherdTour.start();
                window.localStorage.setItem('tour-performer-is-verified', true);
            }
        @else
            var tourUserIsUnVerified = window.localStorage.getItem('tour-performer-is-unverified');
            if (null === tourUserIsUnVerified || false === tourUserIsUnVerified) {
                const shepherdTour = setupShepherd();
                shepherdTour.start();
                window.localStorage.setItem('tour-performer-is-unverified', true);
            }
        @endif
    }

    function setupShepherd() {
        
        const shepherd = new Shepherd.Tour({
            defaultStepOptions: {
                scrollTo: true,
                showCancelLink: true
            },
            useModalOverlay: true
        });

        shepherd.addStep('public-profile', {
            text: "{!!__('web/home/home.performer_tour.public_profile')!!}",
            attachTo: '.performer-tour-view-public-profile bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        @if(true === $user->is_verified)
        shepherd.addStep('upload-media', {
            text: "{!!__('web/home/home.performer_tour.upload_media')!!}",
            attachTo: '.performer-tour-upload-media',
            buttons: [{
                action: shepherd.cancel,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });
        @else
        shepherd.addStep('performer-not-verified', {
            text: "{!!__('web/home/home.performer_tour.performer_not_verified')!!}",
            attachTo: '.performer-tour-profile-not-verified',
            buttons: [{
                action: shepherd.cancel,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });
        @endif

        shepherd.addStep('current-balance', {
            text: '{{__('web/home/home.performer_tour.current_balance')}}',
            attachTo: '.performer-tour-current-balance top',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('total-balance', {
            text: '{{__('web/home/home.performer_tour.total_balance')}}',
            attachTo: '.performer-tour-total-balance top',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('followers', {
            text: '{{__('web/home/home.performer_tour.number_of_followers')}}',
            attachTo: '.performer-tour-followers top',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('twitter-feed', {
            text:'{{__('web/home/home.performer_tour.twitter_feed')}}',
            attachTo: '.performer-tour-twitter-feed top',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('top-videos-by-earnings', {
            text: '{{__('web/home/home.performer_tour.top_videos_by_earnings')}}',
            attachTo: '.performer-tour-top-videos-by-earnings top',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        if ($(window).width() > 768) {
            var exploreMenuClass = '.performer-tour-explore-menu-item';
            var headerFollowersNotificationsClass = '.performer-tour-header-followers-notifications';
            var headerNotificationsClass = '.performer-tour-header-notifications';
            var headerCoinsClass = '.performer-tour-header-coins';
            var userMenuClass = '.performer-tour-user-menu';
            var userMenuText = '{{__('web/home/home.performer_tour.user_menu_hover_to_reveal')}}';
            var headerSearchClass = '.performer-tour-header-search';
            
        } else {
            var exploreMenuClass = '.performer-tour-responsive-explore-menu'
            var headerFollowersNotificationsClass = '.performer-tour-responsive-header-followers-notifications';
            var headerNotificationsClass = '.performer-tour-responsive-header-notifications';
            var headerCoinsClass = '.performer-tour-responsive-header-coins';
            var userMenuClass = '.performer-tour-responsive-user-menu';
            var userMenuText = '{{__('web/home/home.performer_tour.user_menu_click_to_reveal')}}';
            var headerSearchClass = '.performer-tour-responsive-header-search';
        }

        shepherd.addStep('header-search', {
            text: '{{__('web/home/home.performer_tour.header_search')}}',
            attachTo: headerSearchClass+' bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('explore-menu', {
            text: '{{__('web/home/home.performer_tour.explore_menu')}}',
            attachTo: exploreMenuClass+' bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('header-followers-notifications', {
            text: '{{__('web/home/home.performer_tour.header_followers_notifications')}}',
            attachTo: headerFollowersNotificationsClass+' bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('header-notifications', {
            text: '{{__('web/home/home.performer_tour.header_notifications')}}',
            attachTo: headerNotificationsClass+' bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('header-coins', {
            text: '{{__('web/home/home.performer_tour.header_coins')}}',
            attachTo: headerCoinsClass+' bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });

        shepherd.addStep('user-menu', {
            text: userMenuText+' '+"{!!__('web/home/home.performer_tour.user_menu_explanation')!!}",
            attachTo: userMenuClass+' bottom',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.next')}}'
            }]
        });


        shepherd.addStep('followup', {
            text: '{{__('web/home/home.performer_tour.that_is_all')}}',
            buttons: [{
                action: shepherd.back,
                classes: 'shepherd-button-secondary',
                text: '{{__('web/home/home.performer_tour.back')}}'
            }, {
                action: shepherd.next,
                text: '{{__('web/home/home.performer_tour.done')}}'
            }]
        });

        return shepherd;
    }

    function ready() {
        if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
            init();
        } else {
            document.addEventListener('DOMContentLoaded', init);
        }
    }

    ready();

}).call(this);
</script>