@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
	@guest
		@include('web.home.home.home.guest') 
	@endguest

	@auth
		@if($profileTypePerfomer === $user->profile_type)

		@elseif($profileTypeViewer === $user->profile_type)
			@component('components.media.videos-with-stories', ['videos'=> $videos]) 
			@endcomponent
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