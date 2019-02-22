<script type="text/javascript">
$('{{$cssClass}}').each(function() {
        var bar = new ProgressBar.Circle(this, {
            strokeWidth: 10,
            easing: 'easeInOut',
            duration: 40000,
            color: '#FF5E3A',
            trailColor: '#B5B5B5',
            trailWidth: 1,
            svgStyle: null
        });

        bar.set(1)
        bar.animate(0);
});
</script>