<div class="profile-picture-wrapper">
    <img src="{{$profilePicture}}" alt="author">
    @if(true === $isVerified)
    <img src="/img/verified.png" class="verified-tick {{$verifiedTickSizeClass}}">
    @endif
</div>