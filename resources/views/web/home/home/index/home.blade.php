@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
	@include('components.media.videos-with-stories') 
@endsection

@push('javascript')
	@if(null !== $javascript )
	<script type="text/javascript">
		{!! $javascript !!}
	</script>
	@endif
@endpush