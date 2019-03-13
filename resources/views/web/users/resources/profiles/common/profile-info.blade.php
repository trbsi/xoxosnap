<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block profile-info">
                <div class="top-header">
                    <!--
                        <div class="top-header-thumb">
                            <img src="/img/top-header1.jpg" alt="nature">
                        </div>
                        -->
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{route('user.profile', ['username' => $user->username])}}" class="active">{{__('web/users/resources/profile.snaps')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.about', ['username' => $user->username])}}">{{__('web/users/resources/profile.about')}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#">{{__('web/users/resources/profile.followers')}}: {{$user->profile->followers}}</a>
                                    </li>
                                    <li>
                                        <a href="#">{{__('web/users/resources/profile.videos')}}: {{$user->profile->videos}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="control-block-button">
                            <?php /*
                            <div class="btn btn-control more">
                                <img src="/img/badge5.png" alt="author">
                                <ul class="more-dropdown more-with-triangle triangle-top-right" style="left:0">
                                    <li>
                                        <span>Expert Filmaker</span> 
                                        <span style="white-space: pre-wrap; font-weight: normal;">You have uploaded more than 80 videos to your profile.</span>      
                                    </li>
                                </ul>
                            </div>
                            */ ?>

                            @if($user->id !== $authUser->id)
                                <img src="/img/loading_circle.gif" id="follow-user-loading-circle" style="display: none;">
                                <div class="btn btn-control bg-blue more" id="follow-user" style="{{(true === $isUserFollowed) ? 'display: none;' : ''}}">
                                    <svg class="olymp-plus-icon">
                                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                    </svg>
                                     <ul class="more-dropdown more-with-triangle triangle-top-right">
                                        <li>
                                            <span>{{__('web/users/resources/profile.follow')}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn btn-control bg-primary more" id="unfollow-user" style="{{(false === $isUserFollowed) ? 'display: none;' : ''}}">
                                    <svg class="olymp-minus-icon">
                                        <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-minus-icon"></use>
                                    </svg>
                                     <ul class="more-dropdown more-with-triangle triangle-top-right">
                                        <li>
                                            <span>{{__('web/users/resources/profile.unfollow')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            @if($user->id === $authUser->id)
                            <a class="btn btn-control bg-primary more" href="{{route('user.profile.get')}}">
                                <svg class="olymp-settings-icon">
                                    <use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
                                </svg>
                                <ul class="more-dropdown more-with-triangle triangle-top-right">
                                    <li>
                                        <a href="{{route('user.profile.get')}}">{{__('web/users/resources/profile.account_settings')}}</a>
                                    </li>
                                </ul>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="{{route('user.profile', ['username' => $user->username])}}" class="profile-author-thumb">
                        <img src="{{$user->profile->picture}}" alt="author">
                        </a>
                        <div class="author-content">
                            <a href="{{route('user.profile', ['username' => $user->username])}}" class="h4 author-name">{{$user->name ?? $user->username}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ... end Top Header-Profile -->

@push('javascript')
<script type="text/javascript">
    $('#follow-user, #unfollow-user').click(function() {
        var followUserButton = $('#follow-user');
        var unfollowUserButton = $('#unfollow-user');
        var loadingCircle = $('#follow-user-loading-circle');

        followUserButton.hide();
        unfollowUserButton.hide();
        loadingCircle.show();

        var dataToPost = {userId: {{$user->id}}};
        var response = ajax('{{route('users.follow-user')}}', 'POST', dataToPost);
    
        response
        .done(function(data) {
            if (true === data.followed) {
                loadingCircle.hide();
                followUserButton.hide();
                unfollowUserButton.show();
            } else {
                loadingCircle.hide();
                followUserButton.show();
                unfollowUserButton.hide();
           }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            followUserButton.show();
            unfollowUserButton.hide();
            loadingCircle.hide();
        });

    });
</script>
@endpush