@extends('layouts.site.core')

@section('title', __('web/search/search.search'))

@section('body')
<div class="container">
    <div class="row">
    	<div class="col col-xl-12 order-xl-12 col-lg-12 order-lg-12 col-md-12 col-sm-12 col-12">
    		<div class="btn-group btn-group-justified" role="group" style="display: flex;">
			  <a href="{{route('search', ['term' => $term, 'type' => 'users'])}}" class="btn {{($searchTypeUsers === $type ? 'btn-primary' : 'btn-secondary')}} btn-lg" style="flex: 1;">{{__('web/search/search.search_users')}}</a>
			  <a href="{{route('search', ['term' => $term, 'type' => 'media'])}}" class="btn {{($searchTypeMedia === $type ? 'btn-primary' : 'btn-secondary')}} btn-lg" style="flex: 1;">{{__('web/search/search.search_videos')}}</a>
			</div>
    	</div>
        <!-- Main Content -->
        <div class="col col-xl-12 order-xl-12 col-lg-12 order-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <div class="h6 title">{{__('web/search/search.showing_result_for')}} "<span class="c-primary">{{$term}}</span>"</div>
                </div>
            </div>
            <div id="search-items-grid">
            	@if($searchTypeUsers === $type)	
            		@include('web.search.search.users-result')
                    {{$result->appends(request()->except('page'))->links()}}
            	@elseif($searchTypeMedia === $type)
                    @component('components.media.only-videos', ['media' => $result])
                    @endcomponent
            	@endif
            </div>
        </div>
        <!-- ... end Main Content -->
    </div>
</div>
@endsection

@push('javascript')
    @if($searchTypeUsers === $type)
    <script type="text/javascript">
        //infinite scroll
        $('#search-items-grid ul.pagination').hide();
        $(function() {
            $('#search-items-grid').jscroll({
                autoTrigger: true,
                loadingHtml: '<div style="text-align:center;"><img src="/img/loading_videos.gif" alt="Loading..." /></div>',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div#search-items-grid',
                callback: function() {
                    $('#search-items-grid ul.pagination').remove();
                }
            });
        });
    </script>
    @endif
@endpush