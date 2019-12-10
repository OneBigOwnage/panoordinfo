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
    // Core JavaScript files:
    'resources/js/mimity-script.js',
    'resources/js/mimity-app.js',
    'resources/js/mimity-ajax.js',
    'resources/js/helpers.js',

    // Plugins
    'node_modules/flatpickr/dist/flatpickr.js',
], 'public/js/admin-app.js');

mix.styles([
    // Core CSS files:
    'resources/css/mimity-styles.css',

    // Plugins
    'node_modules/flatpickr/dist/flatpickr.css',
], 'public/css/admin-app.css');

mix.copy('resources/img', 'public/img');
