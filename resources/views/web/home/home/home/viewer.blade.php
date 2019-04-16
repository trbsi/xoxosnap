@if(false === $media->isEmpty())
	@component('components.media.videos-with-stories-component', ['media'=> $media, 'stories' => $stories]) 
	@endcomponent
@else
	@include('web.home.home.home.viewer-follow-performers')
@endif

@push('javascript')
	@include('web.home.home.home.javascript.viewer-tour')
@endpush
