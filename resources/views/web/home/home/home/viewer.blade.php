@if(false === $media->isEmpty())
	@component('components.media.videos-with-stories', ['media'=> $media, 'stories' => $stories]) 
	@endcomponent
@else
	@include('web.home.home.home.viewer-follow-performers')
@endif