<script>
    (function () {

        function init() {
            var tourViewerFollowPerformers = window.localStorage.getItem('tour-viewer-follow-performers');
            var followPerformersClass = $('.viewer-tour-follow-performers').length;

            if (
                followPerformersClass > 0
                &&
                (null === tourViewerFollowPerformers || false === tourViewerFollowPerformers)
            ) {
                const shepherdTour = setupShepherd(followPerformersClass);
                shepherdTour.start();
                window.localStorage.setItem('tour-viewer-follow-performers', true);
            }


            var tourViewerPerformersFollowed = window.localStorage.getItem('tour-viewer-performers-followed');
            if (
                0 === followPerformersClass
                &&
                (null === tourViewerPerformersFollowed || false === tourViewerPerformersFollowed)
            ) {
                const shepherdTour = setupShepherd(followPerformersClass);
                shepherdTour.start();
                window.localStorage.setItem('tour-viewer-performers-followed', true);
            }

        }

        function setupShepherd(followPerformersClass) {

            const shepherd = new Shepherd.Tour({
                defaultStepOptions: {
                    scrollTo: true,
                    showCancelLink: true
                },
                useModalOverlay: true
            });

            if (followPerformersClass > 0) {
                shepherd.addStep('follow-performers', {
                    text: "{!!__('web/home/home.viewer_tour_follow_performers.follow_performers')!!}",
                    attachTo: '.viewer-tour-follow-performers',
                    buttons: [{
                        action: shepherd.back,
                        classes: 'shepherd-button-secondary',
                        text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                    }, {
                        action: shepherd.next,
                        text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                    }]
                });
            } else {
                shepherd.addStep('performer-stories', {
                    text: '{{__('web/home/home.viewer_tour_follow_performers.performer_stories')}}',
                    attachTo: '.viewer-tour-performer-stories bottom',
                    buttons: [{
                        action: shepherd.back,
                        classes: 'shepherd-button-secondary',
                        text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                    }, {
                        action: shepherd.next,
                        text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                    }]
                });

                shepherd.addStep('performer-videos', {
                    text: '{{__('web/home/home.viewer_tour_follow_performers.performer_videos')}}',
                    attachTo: '.viewer-tour-performer-videos',
                    buttons: [{
                        action: shepherd.back,
                        classes: 'shepherd-button-secondary',
                        text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                    }, {
                        action: shepherd.next,
                        text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                    }]
                });
            }


            if ($(window).width() > 768) {
                var exploreMenuClass = '.performer-tour-explore-menu-item';
                var headerNotificationsClass = '.performer-tour-header-notifications';
                var headerCoinsClass = '.performer-tour-header-coins';
                var userMenuClass = '.performer-tour-user-menu';
                var userMenuText = '{{__('web/home/home.viewer_tour_follow_performers.user_menu')}}';
                var headerSearchClass = '.performer-tour-header-search';

            } else {
                var exploreMenuClass = '.performer-tour-responsive-explore-menu'
                var headerNotificationsClass = '.performer-tour-responsive-header-notifications';
                var headerCoinsClass = '.performer-tour-responsive-header-coins';
                var userMenuClass = '.performer-tour-responsive-user-menu';
                var userMenuText = '{{__('web/home/home.viewer_tour_follow_performers.user_menu_responsive')}}';
                var headerSearchClass = '.performer-tour-responsive-header-search';
            }

            shepherd.addStep('header-search', {
                text: '{{__('web/home/home.viewer_tour_follow_performers.header_search')}}',
                attachTo: headerSearchClass + ' bottom',
                buttons: [{
                    action: shepherd.back,
                    classes: 'shepherd-button-secondary',
                    text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                }, {
                    action: shepherd.next,
                    text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                }]
            });

            shepherd.addStep('explore-menu', {
                text: '{{__('web/home/home.viewer_tour_follow_performers.explore_menu')}}',
                attachTo: exploreMenuClass + ' bottom',
                buttons: [{
                    action: shepherd.back,
                    classes: 'shepherd-button-secondary',
                    text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                }, {
                    action: shepherd.next,
                    text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                }]
            });

            shepherd.addStep('header-notifications', {
                text: '{{__('web/home/home.viewer_tour_follow_performers.header_notifications')}}',
                attachTo: headerNotificationsClass + ' bottom',
                buttons: [{
                    action: shepherd.back,
                    classes: 'shepherd-button-secondary',
                    text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                }, {
                    action: shepherd.next,
                    text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                }]
            });

            shepherd.addStep('header-coins', {
                text: '{{__('web/home/home.viewer_tour_follow_performers.header_coins')}}',
                attachTo: headerCoinsClass + ' bottom',
                buttons: [{
                    action: shepherd.back,
                    classes: 'shepherd-button-secondary',
                    text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                }, {
                    action: shepherd.next,
                    text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                }]
            });

            shepherd.addStep('user-menu', {
                text: userMenuText + ' ' + '{{__('web/home/home.viewer_tour_follow_performers.user_menu_explanation')}}',
                attachTo: userMenuClass + ' bottom',
                buttons: [{
                    action: shepherd.back,
                    classes: 'shepherd-button-secondary',
                    text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                }, {
                    action: shepherd.next,
                    text: '{{__('web/home/home.viewer_tour_follow_performers.next')}}'
                }]
            });


            shepherd.addStep('followup', {
                text: '{{__('web/home/home.viewer_tour_follow_performers.that_is_all')}}',
                buttons: [{
                    action: shepherd.back,
                    classes: 'shepherd-button-secondary',
                    text: '{{__('web/home/home.viewer_tour_follow_performers.back')}}'
                }, {
                    action: shepherd.next,
                    text: '{{__('web/home/home.viewer_tour_follow_performers.done')}}'
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