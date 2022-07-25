const mix = require('laravel-mix')
            require('laravel-mix-webp')
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

mix.copy('resources/img', 'public/img')
mix.ImageWebp({
    from: 'resources/img',
    to: 'public/img'
})
mix.js('resources/js/index.js', 'public/js')
    .js('resources/js/catalog.js', 'public/js')
mix.less('resources/less/index.less', 'public/css')
    .less('resources/less/catalog.less', 'public/css')
mix.version()
mix.disableNotifications()