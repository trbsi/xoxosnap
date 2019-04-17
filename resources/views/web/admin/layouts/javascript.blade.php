<!-- Bootstrap core JavaScript-->
<script src="/js/admin-all.js"></script>

<script>
@foreach (['error', 'warning', 'success', 'info'] as $key)
    @if(session()->has($key))
        @switch($key)
            @case('success')
                toastr.success('{{session($key)}}');
                @break
            @case('error')
                toastr.error('{{session($key)}}');
                @break
            @case('info')
                toastr.info('{{session($key)}}');
                @break
            @case('warning')
                toastr.warning('{{session($key)}}');
                @break
        @endswitch
    @endif
@endforeach
</script>
@stack('javascript')