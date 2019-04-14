<?php
use App\Models\Notification;
use App\Models\User;
?>

<!-- Header-BP -->
<header class="header" id="site-header">
    <div class="page-title">
        <a href="/"><img src="/img/logo/logo-xsml.png"></a>
    </div>
    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests performer-tour-header-search" method="GET"
              action="{{route('web.search')}}">
            <input type="hidden" name="type" value="{{request()->query('type') ?? 'users'}}">
            <div class="form-group with-button">
                <input class="form-control" name="term" placeholder="{{__('general/header.search_placeholder')}}"
                       type="text" value="{{request()->query('term') ?? ''}}">
                <button>
                    <svg class="olymp-magnifying-glass-icon">
                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                    </svg>
                </button>
            </div>
        </form>
        <div class="control-block">
            <div class="control-icon more has-items performer-tour-explore-menu-item">
                <svg class="olymp-explore-icon">
                    <a href="{{route('web.explore')}}">
                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-explore-icon"></use>
                    </a>
                </svg>
                <div class="more-dropdown more-with-triangle triangle-top-center" style="padding: 0;">
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list">
                            <li>
                                {{__('general/header.explore_stars_videos')}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- followers -->
            @if (true === $showNewFollowersNotifications)
                <div class="control-icon more has-items performer-tour-header-followers-notifications">
                    <svg class="olymp-followers-icon">
                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-followers-icon"></use>
                    </svg>
                    @if(0 !== $newFollowersNotificationsCount)
                        <div class="label-avatar bg-blue notification-badge-followers">{{$newFollowersNotificationsCount}}</div>
                    @endif
                    <div class="more-dropdown more-with-triangle triangle-top-center">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">{{__('general/header.followers.followers')}}</h6>
                            <img src="/img/loading_circle.gif" class="mark-as-read-loading" style="display: none">
                            <a href="javascript:;"
                               class="mark-as-read-followers">{{__('general/header.followers.mark_as_read')}}</a>
                        </div>
                        <div class="mCustomScrollbar followers-notifications-container" data-mcs-theme="dark">
                            <ul class="notification-list friend-requests notification-list-followers ">
                                @foreach($newFollowersNotifications as $notification)
                                    <li class="accepted {{(true === $notification->is_read) ? '' : 'un-read'}}">
                                        <div class="notifications-author-thumb">
                                            <img src="{{$notification->byUser->profile->picture}}" alt="author">
                                        </div>
                                        <div class="notification-event">
                                            <div>
                                                <a href="{{$notification->byUser->profile_url}}"
                                                   class="h6 notification-friend">{{$notification->byUser->username}}</a>
                                                {{__('general/header.followers.followed_you')}}
                                            </div>
                                            <span class="notification-date"><time class="entry-date updated"
                                                                                  datetime="{{$notification->created_at}}">{{$notification->created_ago}}</time></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="load-more-followers-loading text-center" style="display: none;">;
                            <img src="/img/loading_circle.gif">
                        </div>
                        <a href="#"
                           class="view-all load-more-followers bg-blue">{{__('general/header.followers.load_more_followers')}}</a>
                    </div>
                </div>
                <!-- followers -->
        @endif

        <!-- notifications -->
            <div class="control-icon more has-items performer-tour-header-notifications">
                <svg class="olymp-notifications-icon">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-notifications-icon"></use>
                </svg>
                @if(0 !== $newNotificationsCount)
                    <div class="label-avatar bg-primary notification-badge-notifications">{{$newNotificationsCount}}</div>
                @endif
                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">{{__('general/header.notifications.notifications')}}</h6>
                        <img src="/img/loading_circle.gif" class="mark-as-read-loading" style="display: none">
                        <a href="javsacript:;"
                           class="mark-as-read-notifications">{{__('general/header.followers.mark_as_read')}}</a>
                    </div>
                    <div class="mCustomScrollbar notifications-container" data-mcs-theme="dark">
                        <ul class="notification-list notification-list-notifications">
                            @foreach($newNotifications as $notification)
                                <li class="{{(true === $notification->is_read) ? '' : 'un-read'}} ">
                                    <div class="notifications-author-thumb">
                                        <img src="{{$notification->byUser->profile->picture}}" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div>
                                            <a href="{{$notification->byUser->profile_url}}"
                                               class="h6 notification-friend">
                                                @switch($notification->byUser->profile_type)
                                                @case(User::USER_TYPE_PERFORMER)
                                                {{$notification->byUser->name}}
                                                @break
                                                @case(User::USER_TYPE_VIEWER)
                                                {{$notification->byUser->username}}
                                                @break
                                                @endswitch
                                            </a>
                                            @switch($notification->notification_type)
                                            @case($notification::TYPE_PERFORMER_NEW_PURCHASE)
                                            {{__('general/header.notifications.bought_your_video')}}
                                            @break
                                            @case($notification::TYPE_VIEWER_PERFORMER_POSTED)
                                            {{__('general/header.notifications.posted_new_video')}}
                                            @break
                                            @endswitch
                                        </div>
                                        <span class="notification-date"><time class="entry-date updated"
                                                                              datetime="{{$notification->created_at}}">{{$notification->created_ago}}</time></span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="load-more-notifications-loading text-center" style="display: none;">;
                        <img src="/img/loading_circle.gif">
                    </div>
                    <a href="javascript:;"
                       class="view-all load-more-notifications bg-primary">{{__('general/header.notifications.view_all_notifications')}}</a>
                </div>
            </div>
            <!-- notifications -->

            <div class="control-icon more has-items performer-tour-header-coins">
                <svg class="olymp-piggy-bank">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-piggy-bank"></use>
                </svg>
                @if(0 != $userComposerCoinsFormatted)
                    <div class="label-avatar bg-breez coins coins-badge">{{$userComposerCoinsFormatted}}</div>
                @endif
                <div class="more-dropdown more-with-triangle triangle-top-center" style="padding: 0;">
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list">
                            <li>
                                {!!__('general/header.coins_explanation', ['coins' => $userComposerCoins])!!}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="author-page author vcard inline-items more performer-tour-user-menu">
                <div class="author-thumb">
                    @component('components.user.profile-picture-component', [
                        'isVerified' => $userComposerIsVerified,
                        'profilePicture' => $userComposerProfilePicture,
                        'verifiedTickSizeClass' => 'verified-tick-small'
                    ])
                    @endcomponent
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            @auth
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">{{__('general/user-menu.your_account')}}</h6>
                            </div>

                            <ul class="account-settings">
                                <li>
                                    <a href="{{route('web.user.profile.settings.account-settings')}}">
                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.profile_settings')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('web.coins.show-buy-coins-form')}}">
                                        <svg class="olymp-piggy-bank">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-piggy-bank"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.buy_coins')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="logout-link">
                                        <svg class="olymp-logout-icon">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.logout')}}</span>
                                    </a>
                                    <form id="logout-form" method="POST" action="{{route('logout')}}"
                                          style="display: none">@csrf</form>
                                </li>
                            </ul>
                            @endauth

                            @guest
                            <ul class="account-settings">
                                <li>
                                    <a href="{{route('login')}}">
                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-login-icon"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.login')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}">
                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-register-icon"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.register')}}</span>
                                    </a>
                                </li>
                            </ul>
                            @endguest
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">{{__('general/user-menu.about')}} {{config('app.name')}}</h6>
                            </div>
                            <ul>
                                <li>
                                    <a href="{{route('web.terms-of-use')}}">
                                        <span>{{__('general/legal.terms_of_use')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('web.privacy-policy')}}">
                                        <span>{{__('general/legal.privacy_policy')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="@if (null !== $userComposerUsername && User::USER_TYPE_PERFORMER === $userComposerProfileType) {{route('web.user.profile', ['username' => $userComposerUsername])}} @else javascript:; @endif"
                   class="author-name fn">
                    <div class="author-title">
                        {{$userComposerName}}
                        <svg class="olymp-dropdown-arrow-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- ... end Header-BP -->

@push('javascript')
@auth
<script type="text/javascript">
    //notifications
    var loadMoreNotificationsLoading = $('.load-more-notifications-loading');
    var notificationsPage = 2;

    $('.load-more-notifications').click(function () {
        var viewAllNotificationsButton = $(this);
        viewAllNotificationsButton.hide();
        loadMoreNotificationsLoading.show();

        var response = ajax('{{route('api.notifications.get')}}', 'GET', {page: notificationsPage});
        response
            .done(function (data) {
                var username = null;
                var notificationText = null;
                var isReadClass = '';
                var notificationsContainer = $('.notifications-container');

                $.each(data.data, function (index, notificationItem) {

                    switch (notificationItem.by_user.profile_type) {
                        case <?=User::USER_TYPE_PERFORMER?>:
                            username = notificationItem.by_user.name;
                            break;
                        case <?=User::USER_TYPE_VIEWER?>:
                            username = notificationItem.by_user.username;
                            break;
                    }

                    switch (notificationItem.notification_type) {
                        case <?=Notification::TYPE_PERFORMER_NEW_PURCHASE?>:
                            notificationText = '{{__('general/header.notifications.bought_your_video')}}';
                            break;
                        case <?=Notification::TYPE_VIEWER_PERFORMER_POSTED?>:
                            notificationText = '{{__('general/header.notifications.posted_new_video')}}';
                            break;
                    }
                    isReadClass = (true === notificationItem.is_read) ? '' : 'un-read';

                    var content = '<li class="' + isReadClass + '">'
                        + '<div class="notifications-author-thumb">'
                        + '<img src="' + notificationItem.by_user.profile.picture + '" alt="author">'
                        + '</div>'
                        + '<div class="notification-event">'
                        + '<div>'
                        + '<a href="/u/' + notificationItem.by_user.username + '" class="h6 notification-friend">'
                        + username + ''
                        + '</a>'
                        + ' '
                        + notificationText + ''
                        + '</div>'
                        + '<span class="notification-date"><time class="entry-date updated" datetime="' + notificationItem.created_at + '">' + notificationItem.created_ago + '</time></span>'
                        + '</div>'
                        + '</li>';

                    $('.notification-list-notifications').append(content);

                    if (0 === notificationsContainer.prop('scrollHeight')) {
                        notificationsContainer = $('.notifications-container-responsive');
                    }

                    notificationsContainer.animate({scrollTop: notificationsContainer.prop("scrollHeight")}, 500);
                });
                notificationsPage++;

                viewAllNotificationsButton.show();
                loadMoreNotificationsLoading.hide();
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                viewAllNotificationsButton.show();
                loadMoreNotificationsLoading.hide();
            });
    });

    //followers
    var loadMoreFollowersLoading = $('.load-more-followers-loading');
    var followersPage = 2;

    $('.load-more-followers').click(function () {
        var viewAllNotificationsButton = $(this);
        viewAllNotificationsButton.hide();
        loadMoreFollowersLoading.show();

        var response = ajax('{{route('api.notifications.get', ['type' => Notification::TYPE_PERFORMER_NEW_FOLLOWER])}}', 'GET', {page: notificationsPage});
        response
            .done(function (data) {
                var isReadClass = '';
                var notificationsContainer = $('.followers-notifications-container');
                $.each(data.data, function (index, notificationItem) {
                    isReadClass = (true === notificationItem.is_read) ? '' : 'un-read';

                    var content = '<li class="accepted ' + isReadClass + '">'
                        + '<div class="notifications-author-thumb">'
                        + '<img src="' + notificationItem.by_user.profile.picture + '" alt="author">'
                        + '</div>'
                        + '<div class="notification-event">'
                        + '<div>'
                        + '<a href="#" class="h6 notification-friend">' + notificationItem.by_user.username + '</a>'
                        + ' '
                        + '{{__('general/header.followers.followed_you')}}'
                        + '</div>'
                        + '<span class="notification-date"><time class="entry-date updated" datetime="' + notificationItem.created_at + '">' + notificationItem.created_ago + '</time></span>'
                        + '</div>'
                        + '</li>';

                    $('.notification-list-followers').append(content);

                    //handle scrolling on responsive
                    if (0 === notificationsContainer.prop('scrollHeight')) {
                        notificationsContainer = $('.followers-notifications-container-responsive');
                    }

                    notificationsContainer.animate({scrollTop: notificationsContainer.prop("scrollHeight")}, 500);
                });
                followersPage++;

                viewAllNotificationsButton.show();
                loadMoreFollowersLoading.hide();
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                viewAllNotificationsButton.show();
                loadMoreFollowersLoading.hide();
            });
    });
</script>

<script type="text/javascript">
    var markAsReadLoading = $('.mark-as-read-loading');

    //mark notifications as read
    $('.mark-as-read-followers').click(function () {
        var markAsReadButton = $(this);
        markAsReadButton.hide();
        markAsReadLoading.show();

        var dataToPost = {type: <?=Notification::TYPE_PERFORMER_NEW_FOLLOWER?>};
        var response = ajax('{{route('api.notifications.mark-all-as-read')}}', 'POST', dataToPost);
        response
            .done(function (data) {
                $('.notification-list-followers li').removeClass('un-read');
                markAsReadButton.show();
                markAsReadLoading.hide();
                $('.notification-badge-followers').text(0);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                markAsReadButton.show();
                markAsReadLoading.hide();
            });
    });

    $('.mark-as-read-notifications').click(function () {
        var markAsReadButton = $(this);
        markAsReadButton.hide();
        markAsReadLoading.show();

        var response = ajax('{{route('api.notifications.mark-all-as-read')}}', 'POST', {});
        response
            .done(function (data) {
                $('.notification-list-notifications li').removeClass('un-read');
                markAsReadButton.show();
                markAsReadLoading.hide();
                $('.notification-badge-notifications').text(0);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                markAsReadButton.show();
                markAsReadLoading.hide();
            });
    });
</script>
@endauth
@endpush