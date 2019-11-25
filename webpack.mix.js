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

mix.scripts([
    'resources/js/mimity-script.js',
    'resources/js/mimity-app.js',
    'resources/js/mimity-ajax.js',
], 'public/js/admin-app.js');

mix.styles([
    'resources/css/mimity-styles.css',
], 'public/css/admin-app.css');

mix.copy('resources/img', 'public/img');
