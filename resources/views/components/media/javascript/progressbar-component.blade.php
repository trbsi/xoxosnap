<script type="text/javascript">
$('{{($cssClass) ?? '.progressbar-continer-vid'}}').each(function() {
        var bar = new ProgressBar.Circle(this, {
            strokeWidth: 10,
            easing: 'easeInOut',
            duration: $(this).data('duration')*1000,
            color: '#FF5E3A',
            trailColor: '#2C2C2C',
            trailWidth: 1,
            svgStyle: null
        });

        bar.set(-$(this).data('current-state')); //"-" so animation goes clockwise
        bar.animate(0);
});
</script>