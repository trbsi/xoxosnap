@extends('layouts.site.core')

@section('title', config('app.name').' | '.$username)

@section('body')
	@include('web.users.resources.profiles.common.profile-info') 
	@include('components.media.videos-with-stories') 
@endsection