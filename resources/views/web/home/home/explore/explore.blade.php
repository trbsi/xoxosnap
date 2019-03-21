<?php
use App\Models\Media;
?>
@extends('layouts.site.core')

@section('title', 'Explore | '.config('app.name'))

@section('body')
	<div class="container">
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title inline-items">
						<div class="btn btn-control btn-control-small bg-orange">
							<svg class="olymp-new"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-new"></use></svg>
						</div>
						<h6 class="title">{{__('web/home/explore.recent_stories')}}</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
    @component('components.media.stories', ['stories' => $stories])
    @endcomponent

    <br>
	<div class="container">
		<div class="row">
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="ui-block">
					<div class="ui-block-title inline-items">
						<div class="btn btn-control btn-control-small bg-orange">
							<svg class="olymp-new"><use xlink:href="/assets/svg-icons/sprites/icons.svg#olymp-new"></use></svg>
						</div>
						<h6 class="title">{{__('web/home/explore.videos')}}</h6>
					</div>
				</div>
			</div>
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="btn-group btn-group-justified grouped-buttons-full-width" role="group" style="display: flex;">
					<a href="{{route('explore', ['type' => Media::ORDER_TYPE_RECENT])}}" class="btn {{(Media::ORDER_TYPE_RECENT === $exploreType) ? 'btn-primary' : 'btn-secondary'}}">
						{{__('web/home/explore.recent_videos')}}
					</a>
					<a href="{{route('explore', ['type' => Media::ORDER_TYPE_ENDING_SOON])}}" class="btn {{(Media::ORDER_TYPE_ENDING_SOON === $exploreType) ? 'btn-primary' : 'btn-secondary'}}">
						{{__('web/home/explore.ending_soon_videos')}}
					</a>
					<a href="{{route('explore', ['type' => Media::ORDER_TYPE_MOST_VIEWED])}}" class="btn {{(Media::ORDER_TYPE_MOST_VIEWED === $exploreType) ? 'btn-primary' : 'btn-secondary'}}">
						{{__('web/home/explore.most_viewed_videos')}}
					</a>
					<a href="{{route('explore', ['type' => Media::ORDER_TYPE_MOST_PAID])}}" class="btn {{(Media::ORDER_TYPE_MOST_PAID === $exploreType) ? 'btn-primary' : 'btn-secondary'}}">
						{{__('web/home/explore.most_paid_videos')}}
					</a>
				</div>
			</div>
		</div>
	</div>

	@component('components.media.only-videos', ['media' => $media])
    @endcomponent

@endsection