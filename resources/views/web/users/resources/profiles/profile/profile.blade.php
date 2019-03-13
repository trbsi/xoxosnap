@extends('layouts.site.core')

@section('title', config('app.name').' | '.$user->username)

@section('body')
	@include('web.users.resources.profiles.common.profile-info') 
	@component('components.media.videos-with-stories', ['media'=> $media, 'stories' => $stories]) 
	@endcomponent
@endsection