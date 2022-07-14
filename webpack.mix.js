const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js");
mix.sass("resources/css/app.scss", "public/css");

/**
 * Admin CSS & JS
 */
mix.js("resources/js/admin.js", "public/admin/js");
mix.js("resources/js/vendor.js", "public/admin/js");

mix.sass("resources/css/admin.scss", "public/admin/css");
// .copy(
//     "node_modules/@fortawesome/fontawesome-free/webfonts",
//     "public/webfonts"
// );
