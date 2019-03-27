<?php
use App\Models\User;
?>

<!-- Responsive Header-BP -->
<header class="header header-responsive" id="site-header-responsive">
    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#explore" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-explore-icon">
                            <a href="{{route('explore')}}">
                                <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-explore-icon"></use>
                            </a>
                        </svg>
                    </div>
                </a>
            </li>
            @if (true === $showNewFollowersNotifications)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-followers-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-followers-icon"></use>
                        </svg>
                        @if(0 !== $newFollowersNotificationsCount)
                        <div class="label-avatar bg-blue notification-badge-followers">{{$newFollowersNotificationsCount}}</div>
                        @endif
                    </div>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-notifications-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-notifications-icon"></use>
                        </svg>
                        @if(0 !== $newNotificationsCount)
                        <div class="label-avatar bg-primary notification-badge-notifications">{{$newNotificationsCount}}</div>
                        @endif
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#coins" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-piggy-bank">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-piggy-bank"></use>
                        </svg>
                        @if(0 != $userComposerCoinsFormatted)
                        <div class="label-avatar bg-breez coins coins-badge">{{$userComposerCoinsFormatted}}</div>
                        @endif
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                    <svg class="olymp-magnifying-glass-icon">
                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                    </svg>
                    <svg class="olymp-close-icon">
                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <!-- Tab panes -->
    <div class="tab-content tab-content-responsive">

        @if (true === $showNewFollowersNotifications)
        <!-- followers -->
        <div class="tab-pane " id="request" role="tabpanel">
            <div class="mCustomScrollbar followers-notifications-container-responsive" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">{{__('general/header.followers.followers')}}</h6>
                    <img src="/img/loading_circle.gif" class="mark-as-read-loading" style="display: none">
                    <a href="javascript:;" class="mark-as-read-followers">{{__('general/header.followers.mark_as_read')}}</a>
                </div>
                <ul class="notification-list friend-requests notification-list-followers">
                    @foreach($newFollowersNotifications as $notification)
                    <li class="accepted {{(true === $notification->is_read) ? '' : 'un-read'}}">
                        <div class="notifications-author-thumb">
                            <img src="{{$notification->byUser->profile->picture}}" alt="author">
                        </div>
                        <div class="notification-event">
                            <div>
                                <a href="{{$notification->byUser->profile_url}}" class="h6 notification-friend">{{$notification->byUser->username}}</a>
                                {{__('general/header.followers.followed_you')}}
                            </div>
                            <span class="notification-date"><time class="entry-date updated" datetime="{{$notification->created_at}}">{{$notification->created_ago}}</time></span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="load-more-followers-loading text-center" style="display: none;">;
                        <img src="/img/loading_circle.gif">
                </div>
                <a href="#" class="view-all load-more-followers bg-blue">{{__('general/header.followers.load_more_followers')}}</a>
            </div>
        </div>
        <!-- followers -->
        @endif

        <!-- notifications -->
        <div class="tab-pane " id="notification" role="tabpanel">
            <div class="mCustomScrollbar notifications-container-responsive" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">{{__('general/header.notifications.notifications')}}</h6>
                    <img src="/img/loading_circle.gif" class="mark-as-read-loading" style="display: none">
                    <a href="javascript:;" class="mark-as-read-notifications">{{__('general/header.followers.mark_as_read')}}</a>
                </div>
                <ul class="notification-list notification-list-notifications">
                    @foreach($newNotifications as $notification)
                    <li class="{{(true === $notification->is_read) ? '' : 'un-read'}}">
                        <div class="notifications-author-thumb">
                            <img src="{{$notification->byUser->profile->picture}}" alt="author">
                        </div>
                        <div class="notification-event">
                            <div>
                                <a href="{{$notification->byUser->profile_url}}" class="h6 notification-friend">
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
                            <span class="notification-date"><time class="entry-date updated" datetime="{{$notification->created_at}}">{{$notification->created_ago}}</time></span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="load-more-notifications-loading text-center" style="display: none;">;
                    <img src="/img/loading_circle.gif">
                </div>
                <a href="#" class="view-all load-more-notifications bg-primary">{{__('general/header.notifications.view_all_notifications')}}</a>
            </div>
        </div>
        <!-- notifications -->

        <div class="tab-pane " id="coins" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="notification-list">
                    <li>
                       {{__('general/header.coins_explanation', ['coins' => $userComposerCoins])}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane " id="explore" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="notification-list">
                    <li>
                       {{__('general/header.explore_stars_videos')}}
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-pane " id="search" role="tabpanel">
            <form class="search-bar w-search notification-list friend-requests" method="GET" action="{{route('search')}}">
                <input type="hidden" name="type" value="{{request()->query('type') ?? 'users'}}">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" name="term" placeholder="{{__('general/header.search_placeholder')}}" type="text" value="{{request()->query('term') ?? ''}}">
                </div>
            </form>
        </div>
    </div>
    <!-- ... end  Tab panes -->
</header>
<!-- ... end Responsive Header-BP -->