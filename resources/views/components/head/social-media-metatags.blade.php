<?php
use App\Models\User;
?>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@<?=env('TWITTER_USERNAME')?>">
@if (User::PROVIDER_TWITTER === $provider)
<meta name="twitter:creator" content="@<?=$username?>">
@endif
<meta name="twitter:title" content="{{$title}}">
<meta name="twitter:description" content="{{$description}}">
<meta name="twitter:image" content="{{$image}}">

<meta property="og:title" content="{{$title}}">
<meta property="og:description" content="{{$description}}">
<meta property="og:image" content="{{$image}}">
<meta property="og:url" content="{{$url}}">