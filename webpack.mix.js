/**
 * Created by Deakyu on 4/14/2017.
 */
const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/libs/bootstrap.min.css',
    'resources/assets/css/libs/app.css'


], 'public/css/libs.css');

mix.scripts([
    'resources/assets/css/libs/jquery.js',
    'resources/assets/css/libs/bootstrap.min.js',
    'resources/assets/css/libs/app.js'

], 'public/js/libs/js');