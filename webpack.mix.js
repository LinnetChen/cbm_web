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

// 單頁開發不再需要某活動頁的scss的話 請註解掉

mix.js("resources/js/app.js", "public/js/")
    .js("resources/js/jointAct.js", "public/js/event")
    .js("resources/js/prereg.js", "public/js/event")
    .js("resources/js/gameMall.js", "public/js/event")
    .sass(
        "resources/sass/event/prereg/style.scss",
        "public/css/event/prereg/style.css"
    )
    .sass(
        "resources/sass/event/20240403_jointAct/style.scss",
        "public/css/event/20240403_jointAct/style.css"
    )
    .sass(
        "resources/sass/event/gameMall/style.scss",
        "public/css/event/gameMall/style.css"
    )
    .postCss("resources/css/app.css", "public/css", [
        //
    ])
    .define({
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false, //把黃色警告擋掉
    })
    .vue();

if (mix.inProduction()) {
    mix.version();
}
