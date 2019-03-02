@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
	@if(true === $isGuest) 
		@include('web.home.home.home.guest') 
	@else
		@include('components.media.videos-with-stories') 
	@endif
@endsection

@push('javascript')
	@if(null !== $javascript )
	<script type="text/javascript">
		{!! $javascript !!}
	</script>
	@endif
@endpush