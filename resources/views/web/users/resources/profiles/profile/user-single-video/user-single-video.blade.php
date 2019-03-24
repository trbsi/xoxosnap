@extends('layouts.site.core')

@section('title', $media->user->username. ' | ' .$media->title)

@section('body')
    @include('web.users.resources.profiles.common.profile-info') 
    @include('web.users.resources.profiles.profile.user-single-video.single-video-template') 
@endsection
