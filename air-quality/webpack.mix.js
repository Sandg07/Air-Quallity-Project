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

mix.webpackConfig({
    stats: {
        children: true,
    },
});

mix.sass("resources/scss/style.scss", "public/css");

mix.js("resources/js/app.js", "public/js");
mix.js("resources/js/map.js", "public/js");

mix.js("resources/js/generalMap.js", "public/js");
mix.js("resources/js/Control.Coordinates.js", "public/js");


mix.js("resources/js/placeAutocomplete.js", "public/js").postCss(
    "resources/css/placeAutocomplete.css",
    "public/css",
    [require("postcss-import"), require("tailwindcss"), require("autoprefixer")]
);

mix.js("resources/js/datepicker.js", "public/js");
