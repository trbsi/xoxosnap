@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
	@guest
		@include('web.home.home.home.guest') 
	@endguest

	@auth
		@if($profileTypePerfomer === $user->profile_type)

		@elseif($profileTypeViewer === $user->profile_type)
		    @if([] !== $videos)
				@component('components.media.videos-with-stories', ['videos'=> $videos, 'stories' => $stories]) 
				@endcomponent
			@else
				@include('web.home.home.home.viewer-follow-performers')
			@endif
		@endif
	@endauth

@endsection

@push('javascript')
	@if(null !== $javascript )
	<script type="text/javascript">
		{!! $javascript !!}
	</script>
	@endif
@endpush