const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/js/app.js', 'public/js')
//   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    //Bootstrap CSS
    'resources/assets/Bootstrap/dist/css/bootstrap-reboot.css',
    'resources/assets/Bootstrap/dist/css/bootstrap.css',
    'resources/assets/Bootstrap/dist/css/bootstrap-grid.css',

    //Main Styles CSS
    'resources/assets/css/fonts.min.css',

    //custom
    'resources/assets/css/zuck.min.css',
    'resources/assets/css/story-skins/snapgram.css',
    'resources/assets/css/plyr.css',
    'resources/assets/css/toastr.min.css',
    'resources/assets/css/token-input-facebook.css',
    'resources/assets/css/mfb.min.css', //floating button
    'resources/assets/css/shepherd-theme-default.css',

    //Main Styles CSS
    'resources/assets/css/main.css',
], 'public/css/all.css');

mix.scripts([
    //JS Scripts
    'resources/assets/js/jquery-3.2.1.js',
    'resources/assets/js/jquery.appear.js',
    'resources/assets/js/jquery.mousewheel.js',
    'resources/assets/js/perfect-scrollbar.js',
    'resources/assets/js/jquery.matchHeight.js',
    'resources/assets/js/svgxuse.js',
    'resources/assets/js/imagesloaded.pkgd.js',
    'resources/assets/js/Headroom.js',
    'resources/assets/js/velocity.js',
    'resources/assets/js/ScrollMagic.js',
    'resources/assets/js/jquery.waypoints.js',
    'resources/assets/js/jquery.countTo.js',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/material.min.js',
    'resources/assets/js/bootstrap-select.js',
    'resources/assets/js/smooth-scroll.js',
    'resources/assets/js/selectize.js',
    'resources/assets/js/swiper.jquery.js',
    'resources/assets/js/moment.js',
    'resources/assets/js/daterangepicker.js',
    'resources/assets/js/simplecalendar.js',
    'resources/assets/js/fullcalendar.js',
    'resources/assets/js/isotope.pkgd.js',
    'resources/assets/js/ajax-pagination.js',
    'resources/assets/js/Chart.js',
    'resources/assets/js/chartjs-plugin-deferred.js',
    'resources/assets/js/circle-progress.js',
    'resources/assets/js/loader.js',
    'resources/assets/js/run-chart.js',
    'resources/assets/js/jquery.gifplayer.js',
    'resources/assets/js/mediaelement-and-player.js',
    'resources/assets/js/mediaelement-playlist-plugin.min.js',
    'resources/assets/js/ion.rangeSlider.js',
    'resources/assets/js/base-init.js',
    'resources/assets/Bootstrap/dist/js/bootstrap.bundle.js',

    //custom
    'resources/assets/js/zuck.js',
    'resources/assets/js/progressbar.min.js',
    'resources/assets/js/jquery.jscroll.min.js',
    'resources/assets/js/plyr.min.js',
    'resources/assets/js/toastr.min.js',
    'resources/assets/js/jquery.tokeninput.min.js',
    'resources/assets/js/bootbox.min.js',
    'resources/assets/js/mfb.min.js',
    'resources/assets/js/shepherd.min.js',

], 'public/js/all.js');

/*---------------ADMIN--------------------*/
mix.styles([
    'resources/assets/admin/css/fontawesome-all.css',
    'resources/assets/admin/css/sb-admin-2.css',
], 'public/css/admin-all.css');

mix.scripts([
    'resources/assets/js/jquery.min.js',
    'resources/assets/js/bootstrap-bundle.min.js',
    'resources/assets/js/jquery.easing.min.js',
    'resources/assets/js/sb-admin-2.js',
], 'public/js/admin-all.js');