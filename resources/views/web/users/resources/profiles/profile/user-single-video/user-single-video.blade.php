@extends('layouts.site.core')

@section('title', $media->user->username. ' | ' .$media->title)

@section('meta')
    @component('components.head.social-media-metatags', [
        'provider' => $media->user->provider,
        'username' => $media->user->username,
        'title' => $media->title,
        'description' => $media->description,
        'image' => $media->thumbnail,
        'url' => $media->url,
    ])
    @endcomponent
@endsection

@section('body')
    @include('web.users.resources.profiles.common.profile-info') 
    @component('components.media.single-video-component', ['media' => $media])
    @endcomponent
@endsection
