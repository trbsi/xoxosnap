@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
	@include('components.media.videos-with-stories') 
@endsection

@push('javascript')
<script type="text/javascript">
	{!! $javascript !!}
</script>
@endpush