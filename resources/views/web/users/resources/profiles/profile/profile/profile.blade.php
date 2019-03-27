@extends('layouts.site.core')

@section('title', config('app.name').' | '.$user->username)

@section('meta')
	@component('components.head.social-media-metatags', [
        'provider' => $user->provider,
        'username' => $user->username,
        'title' => $user->name,
        'description' => $user->profile->description,
        'image' => $user->profile->picture,
        'url' => $user->profile_url,
    ])
    @endcomponent
@endsection

@section('body')
	@include('web.users.resources.profiles.common.profile-info') 
	@component('components.media.videos-with-stories', ['media'=> $media, 'stories' => $stories]) 
	@endcomponent
@endsection