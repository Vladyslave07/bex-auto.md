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
    .js('resources/js/card.js', 'public/js')
    .js('resources/js/dealer.js', 'public/js')
    .js('resources/js/new-elektromobili.js', 'public/js')
    .js('resources/js/elektromobili.js', 'public/js')
    .js('resources/js/delivery.js', 'public/js')
    .js('resources/js/news.js', 'public/js')
    .js('resources/js/article.js', 'public/js')
    .js('resources/js/contacts.js', 'public/js')
    .js('resources/js/guarantee.js', 'public/js')
    .js('resources/js/thanks-order.js', 'public/js')
    .js('resources/js/about.js', 'public/js')
mix.less('resources/less/index.less', 'public/css')
    .less('resources/less/catalog.less', 'public/css')
    .less('resources/less/card.less', 'public/css')
    .less('resources/less/dealer.less', 'public/css')
    .less('resources/less/new-elektromobili.less', 'public/css')
    .less('resources/less/elektromobili.less', 'public/css')
    .less('resources/less/delivery.less', 'public/css')
    .less('resources/less/news.less', 'public/css')
    .less('resources/less/article.less', 'public/css')
    .less('resources/less/contacts.less', 'public/css')
    .less('resources/less/guarantee.less', 'public/css')
    .less('resources/less/thanks-order.less', 'public/css')
    .less('resources/less/about.less', 'public/css')
mix.version()
mix.disableNotifications()