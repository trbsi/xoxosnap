@extends('layouts.site.core')

@section('title', config('app.name'))

@section('body')
    @guest
    @include('web.home.home.home.guest')
    @endguest

    @auth
    @if($profileTypePerfomer === $user->profile_type)
        @include('web.home.home.home.performer')
    @elseif($profileTypeViewer === $user->profile_type)
        @include('web.home.home.home.viewer')
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