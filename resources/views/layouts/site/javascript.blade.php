<?php
use App\Models\Notification;
?>

<!-- custom -->
<script src="/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script async src="https://static.addtoany.com/menu/page.js"></script>

<script type="text/javascript">
  //redirect when cloced on explore button in header
	$('.olymp-explore-icon').click(function() {
		window.location.href = "{{route('web.explore')}}";
	});

  //post form to logout
	$('.logout-link').click(function() {
		$('#logout-form').submit();
	});

</script>

<script type="text/javascript">

  function ajax(urlToCall, method, dataToPost) {
    return $.ajax({
        url : urlToCall,
        type: method,
        beforeSend: function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
        },
        data : dataToPost
    });
}
</script>

<script type="text/javascript">
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

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

@if (request('success'))
  toastr.success('{{request('success')}}');
@endif
</script>

<script>
    function areYouSure()
    {
        return Swal.fire({
			title: '{{__('general/site.are_you_sure')}}',
			type: 'question',
			showCancelButton: true,
			showConfirmButton: true,
		});
    }
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135376165-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  @if(null !== $userComposerUserId)
  gtag('set', {'user_id': '{{$userComposerUserId}}'}); // Set the user ID using signed-in user_id.
  @endif
  gtag('config', 'UA-135376165-1');
</script>
