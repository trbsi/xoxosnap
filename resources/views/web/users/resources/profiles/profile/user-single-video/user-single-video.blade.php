<?php
use App\Models\User;
?>

@extends('layouts.site.core')

@section('title', $media->user->username. ' | ' .$media->title)

@section('meta')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@<?=env('TWITTER_USERNAME')?>">
@if (User::PROVIDER_TWITTER === $media->user->provider)
<meta name="twitter:creator" content="@{{$media->user->username}}">
@endif
<meta name="twitter:title" content="{{$media->title}}">
<meta name="twitter:description" content="{{$media->description}}">
<meta name="twitter:image" content="{{$media->thumbnail}}">
@endsection

@section('body')
    @include('web.users.resources.profiles.common.profile-info') 
    @component('components.media.single-video', ['media' => $media])
    @endcomponent
@endsection
