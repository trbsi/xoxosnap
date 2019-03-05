@if($useScriptTag)
<script>
@endif
	$('.performer-video').each(function() {
	    new Plyr($(this), {
	        controls: [],
	        clickToPlay: false
   		});	
    });
@if($useScriptTag)
</script>
@endif