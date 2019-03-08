<!-- Header-BP -->
<header class="header" id="site-header">
    <div class="page-title">
        <a href="/"><h6>{{config('app.name')}}</h6></a>
    </div>
    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control" placeholder="Search here people or videos..." type="text">
                <button>
                    <svg class="olymp-magnifying-glass-icon">
                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                    </svg>
                </button>
            </div>
        </form>
        <div class="control-block">
            <div class="control-icon more has-items">
                <svg class="olymp-explore-icon">
                    <a href="{{route('explore')}}">
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
            <div class="control-icon more has-items">
                <svg class="olymp-followers-icon">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-followers-icon"></use>
                </svg>
                @if(0 !== $newFollowersNotificationsCount)
                <div class="label-avatar bg-blue">{{$newFollowersNotificationsCount}}</div>
                @endif
                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">{{__('general/header.followers.followers')}}</h6>
                        <a href="javascript:;" class="mark-as-read-followers">{{__('general/header.followers.mark_as_read')}}</a>
                    </div>
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list friend-requests notification-list-followers">
                            @foreach($newFollowersNotifications as $notification)
                            <li class="accepted {{(true === $notification->is_read) ? '' : 'un-read'}}">
                                <div class="notifications-author-thumb">
                                    <img src="{{$notification->byUser->profile->picture}}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div>
                                        <a href="#" class="h6 notification-friend">{{$notification->byUser->username}}</a>
                                        {{__('general/header.followers.followed_you')}}
                                    </div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="{{$notification->created_at}}">{{$notification->created_ago}}</time></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="#" class="view-all bg-blue">{{__('general/header.followers.view_all_followers')}}</a>
                </div>
            </div>
            @endif
            <!-- followers -->

            <!-- notifications -->
            <div class="control-icon more has-items">
                <svg class="olymp-notifications-icon">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-notifications-icon"></use>
                </svg>
                @if(0 !== $newNotificationsCount)
                <div class="label-avatar bg-primary">{{$newNotificationsCount}}</div>
                @endif
                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">{{__('general/header.notifications.notifications')}}</h6>
                        <a href="javsacript:;" class="mark-as-read-notifications">{{__('general/header.followers.mark_as_read')}}</a>
                    </div>
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list notification-list-notifications">
                            @foreach($newNotifications as $notification)
                            <li class="{{(true === $notification->is_read) ? '' : 'un-read'}}">
                                <div class="notifications-author-thumb">
                                    <img src="{{$notification->byUser->profile->picture}}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div>
                                        <a href="{{route('user.profile', ['username' => $notification->byUser->username])}}" class="h6 notification-friend">
                                            @switch($notification->byUser->profile_type)
                                                @case($user::USER_TYPE_PERFORMER)
                                                    {{$notification->byUser->name}}
                                                    @break
                                                @case($user::USER_TYPE_VIEWER)
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
                    </div>
                    <a href="#" class="view-all bg-primary">{{__('general/header.notifications.view_all_notifications')}}</a>
                </div>
            </div>
            <!-- notifications -->

            <div class="control-icon more has-items">
                <svg class="olymp-piggy-bank">
                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-piggy-bank"></use>
                </svg>
                @if(0 != $coinsFormatted)
                <div class="label-avatar bg-breez coins">{{$coinsFormatted}}</div>
                @endif
                <div class="more-dropdown more-with-triangle triangle-top-center" style="padding: 0;">
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list">
                            <li>
                               {{__('general/header.coins_explanation', ['coins' => $coins])}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img alt="author" src="{{$profilePicture}}" class="avatar">
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            @auth
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">{{__('general/user-menu.your_account')}}</h6>
                            </div>
                            
                            <ul class="account-settings">
                                <li>
                                    <a href="29-YourAccount-AccountSettings.html">
                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.profile_settings')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" class="logout-link">
                                        <svg class="olymp-logout-icon">
                                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                                        </svg>
                                        <span>{{__('general/user-menu.logout')}}</span>
                                    </a>
                                    <form id="logout-form" method="POST" action="{{route('logout')}}" style="display: none">@csrf</form>
                                </li>
                            </ul>
                            @endauth
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">{{__('general/user-menu.about')}} {{config('app.name')}}</h6>
                            </div>
                            <ul>
                                <li>
                                    <a href="{{route('terms-of-use')}}">
                                    <span>{{__('general/legal.terms_of_use')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('privacy-policy')}}">
                                    <span>{{__('general/legal.privacy_policy')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="@if (null !== $username) {{route('user.profile', ['username' => $username])}} @else javascript:; @endif" class="author-name fn">
                    <div class="author-title">
                        {{$name}}
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