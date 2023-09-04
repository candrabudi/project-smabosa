const mix = require('laravel-mix');
require('laravel-mix-imagemin');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')