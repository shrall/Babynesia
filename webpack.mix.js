const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, Adminfluent API for defining some Webpack build steps
 | for your Laravel application. By default, Adminwe are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


 mix
 .postCss("resources/css/app.css", "public/css", [
   require("tailwindcss"),
 ]);
