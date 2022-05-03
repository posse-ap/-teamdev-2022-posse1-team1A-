const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
    .postCss('resources/css/footer.css', 'public/css')
    .postCss('resources/css/top.css', 'public/css')
    .postCss('resources/css/search.css', 'public/css')
    .postCss('resources/css/ticket.css', 'public/css')
    .postCss('resources/css/modal.css', 'public/css')
    .js('resources/js/modal.js', 'public/js');
;

