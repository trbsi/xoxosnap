@extends('layouts.site.core')

@section('title', 'Explore | '.config('app.name'))

@section('body')
    @component('components.media.stories')
    @endcomponent

	@include('web.home.explore.new')
	@include('web.home.explore.popular')
@endsection
