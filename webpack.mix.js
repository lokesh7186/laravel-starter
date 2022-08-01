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

mix.js("resources/js/vendor.js", "public/build/js");
mix.js("resources/js/app.js", "public/build/js");
mix.sass("resources/css/app.scss", "public/build/css");

/**
 * Admin CSS & JS
 */
mix.scripts(
    ["resources/js/admin/adminlte.min.js", "resources/js/admin/custom.js"],
    "public/build/admin/js/admin.js"
);
mix.js("resources/js/admin/vendor.js", "public/build/admin/js");

mix.sass("resources/css/admin.scss", "public/build/admin/css");

if (mix.inProduction()) {
    mix.version();
}
