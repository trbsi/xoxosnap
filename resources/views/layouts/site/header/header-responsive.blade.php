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
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-followers-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-followers-icon"></use>
                        </svg>
                        <div class="label-avatar bg-blue">6</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-notifications-icon">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-notifications-icon"></use>
                        </svg>
                        <div class="label-avatar bg-primary">8</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#coins" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-piggy-bank">
                            <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-piggy-bank"></use>
                        </svg>
                        <div class="label-avatar bg-breez coins">18k</div>
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
        <div class="tab-pane " id="request" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">FRIEND REQUESTS</h6>
                    <a href="#">Find Friends</a>
                </div>
                <ul class="notification-list friend-requests">
                    <li>
                        <div class="author-thumb">
                            <img src="/img/avatar55-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tamara Romanoff</a>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="/img/avatar56-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tony Stevens</a>
                        </div>
                    </li>
                    <li class="accepted">
                        <div class="author-thumb">
                            <img src="/img/avatar57-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tony Stevens</a>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="/img/avatar58-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tony Stevens</a>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-blue">View all new followers</a>
            </div>
        </div>
        <div class="tab-pane " id="notification" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Notifications</h6>
                    <a href="#">Mark all as read</a>
                </div>
                <ul class="notification-list">
                    <li>
                        <div class="author-thumb">
                            <img src="/img/avatar62-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                        <span class="notification-icon">
                            <svg class="olymp-comments-post-icon">
                                <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                            </svg>
                        </span>
                    </li>
                    <li class="un-read">
                        <div class="author-thumb">
                            <img src="/img/avatar63-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
                        </div>
                    </li>
                    <li class="with-comment-photo">
                        <div class="author-thumb">
                            <img src="/img/avatar64-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                        </div>
                        <span class="notification-icon">
                            <svg class="olymp-comments-post-icon">
                                <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                            </svg>
                        </span>
                        <div class="comment-photo">
                            <img src="/img/comment-photo1.jpg" alt="photo">
                            <span>“She looks incredible in that outfit! We should see each...”</span>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="/img/avatar65-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="/img/avatar66-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                        </div>
                        <span class="notification-icon">
                            <svg class="olymp-heart-icon">
                                <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                            </svg>
                        </span>
                    </li>
                </ul>
                <a href="#" class="view-all bg-primary">View All Notifications</a>
            </div>
        </div>
        <div class="tab-pane " id="coins" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="notification-list">
                    <li>
                       You have 666 NaughtyCoins. Use them to purchase goods on PornSnap
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane " id="explore" role="tabpanel">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="notification-list">
                    <li>
                       Explore new stars, videos and stories
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-pane " id="search" role="tabpanel">
            <form class="search-bar w-search notification-list friend-requests">
                <div class="form-group with-button">
                    <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
                </div>
            </form>
        </div>
    </div>
    <!-- ... end  Tab panes -->
</header>
<!-- ... end Responsive Header-BP -->