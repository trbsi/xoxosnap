@extends('layouts.site.core')

@section('title', 'Profile')

@section('body')
	@include('web.users.resources.profiles.common.profile-info')
	@include('web.users.resources.profiles.profile.about.about-body')
@endsection
