@foreach($result as $user)
<div class="ui-block">
    <!-- Search Result -->
    <article class="hentry post searches-item">
        <div class="post__author author vcard inline-items">
            <img src="{{$user->profile->picture}}" alt="author">
            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{route('user.profile', ['username' => $user->username])}}">{{$user->name}}</a>
                <div class="country">{{$user->username}}</div>
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
            <span class="title">About Me:</span> {{nl2br($user->profile->description)}}
        </p>
    </article>
    <!-- ... end Search Result -->
</div>
@endforeach

