@foreach($result as $user)
<div class="ui-block">
    <!-- Search Result -->
    <article class="hentry post searches-item">
        <div class="post__author author vcard inline-items">
            <a href="{{$user->profile_url}}">
                <img src="{{$user->profile->picture}}" alt="author">
            </a>
            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{$user->profile_url}}">{{$user->name}}</a>
                <div class="country">
                    <a href="{{$user->profile_url}}">{{$user->username}}</a>
                </div>
            </div>
            <?php /*
            <span class="notification-icon">
                <a href="#" class="accept-request">
                    <span class="icon-add without-text">
                        <svg class="olymp-happy-face-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
                        </svg>
                    </span>
                </a>
                <a href="#" class="accept-request chat-message">
                    <svg class="olymp-chat---messages-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                    </svg>
                </a>
            </span>
            */?>
        </div>
        <p class="user-description">
            <span class="title">{{__('web/search/search.about_me')}}:</span> {{nl2br($user->profile->description)}}
        </p>
    </article>
    <!-- ... end Search Result -->
</div>
@endforeach

