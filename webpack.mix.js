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

mix
    .sass('resources/views/template/assets/sass/style.scss', 'public/template/assets/css/style.css')

    .styles([
        'resources/views/template/assets/css/animate.css',
        'resources/views/template/assets/css/icomoon.css',
        'resources/views/template/assets/css/bootstrap.css',
        'resources/views/template/assets/css/magnific-popup.css',
        'resources/views/template/assets/css/owl.carousel.min.css',
        'resources/views/template/assets/css/owl.theme.default.min.css',
    ], 'public/template/assets/css/vendor.css')

    .scripts([
        'resources/views/template/assets/js/modernizr-2.6.2.min.js',
    ], 'public/template/assets/js/modernizr.js')

    .scripts([
        'resources/views/template/assets/js/respond.min.js'
    ], 'public/template/assets/js/respond.js')

    .scripts([
        'resources/views/template/assets/js/jquery.min.js',
        'resources/views/template/assets/js/jquery.easing.1.3.js',
        'resources/views/template/assets/js/bootstrap.min.js',
        'resources/views/template/assets/js/jquery.waypoints.min.js',
        'resources/views/template/assets/js/jquery.stellar.min.js',
        'resources/views/template/assets/js/owl.carousel.min.js',
        'resources/views/template/assets/js/jquery.countTo.js',
        'resources/views/template/assets/js/jquery.magnific-popup.min.js',
        'resources/views/template/assets/js/magnific-popup-options.js',
    ], 'public/template/assets/js/vendor.js')

    .scripts([
        'resources/views/template/assets/js/main.js'
    ], 'public/template/assets/js/main.js')

    .copyDirectory('resources/views/template/assets/fonts', 'public/template/assets/fonts')
    .copyDirectory('resources/views/template/assets/images', 'public/template/assets/images')

    .options({
        processCssUrls: false
    })

    .version();
