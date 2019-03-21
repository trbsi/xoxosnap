<?php
use App\Models\Notification;
?>

<!-- JS Scripts -->
<script src="/assets/js/jquery-3.2.1.js"></script>
<script src="/assets/js/jquery.appear.js"></script>
<script src="/assets/js/jquery.mousewheel.js"></script>
<script src="/assets/js/perfect-scrollbar.js"></script>
<script src="/assets/js/jquery.matchHeight.js"></script>
<script src="/assets/js/svgxuse.js"></script>
<script src="/assets/js/imagesloaded.pkgd.js"></script>
<script src="/assets/js/Headroom.js"></script>
<script src="/assets/js/velocity.js"></script>
<script src="/assets/js/ScrollMagic.js"></script>
<script src="/assets/js/jquery.waypoints.js"></script>
<script src="/assets/js/jquery.countTo.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/material.min.js"></script>
<script src="/assets/js/bootstrap-select.js"></script>
<script src="/assets/js/smooth-scroll.js"></script>
<script src="/assets/js/selectize.js"></script>
<script src="/assets/js/swiper.jquery.js"></script>
<script src="/assets/js/moment.js"></script>
<script src="/assets/js/daterangepicker.js"></script>
<script src="/assets/js/simplecalendar.js"></script>
<script src="/assets/js/fullcalendar.js"></script>
<script src="/assets/js/isotope.pkgd.js"></script>
<script src="/assets/js/ajax-pagination.js"></script>
<script src="/assets/js/Chart.js"></script>
<script src="/assets/js/chartjs-plugin-deferred.js"></script>
<script src="/assets/js/circle-progress.js"></script>
<script src="/assets/js/loader.js"></script>
<script src="/assets/js/run-chart.js"></script>
<script src="/assets/js/jquery.gifplayer.js"></script>
<script src="/assets/js/mediaelement-and-player.js"></script>
<script src="/assets/js/mediaelement-playlist-plugin.min.js"></script>
<script src="/assets/js/ion.rangeSlider.js"></script>
<script src="/assets/js/base-init.js"></script>
<script defer src="/assets/fonts/fontawesome-all.js"></script>
<script src="/assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

<script src="/assets/js/zuck.min.js"></script>
<script src="/assets/js/progressbar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="/assets/js/jquery.jscroll.min.js"></script>
<script src="/assets/js/plyr.min.js"></script>
<script src="/assets/js/toastr.min.js"></script>

<script type="text/javascript">
  //redirect when cloced on explore button in header
	$('.olymp-explore-icon').click(function() {
		window.location.href = "{{route('explore')}}";
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


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135376165-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  @if(null !== $userId)
  gtag('set', {'user_id': '{{$userId}}'}); // Set the user ID using signed-in user_id.
  @endif
  gtag('config', 'UA-135376165-1');
</script>
