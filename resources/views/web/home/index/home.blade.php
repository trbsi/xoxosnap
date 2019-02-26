@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
	@include('components.media.videos-with-stories') 
@endsection