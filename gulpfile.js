const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
var npm_path = "./node_modules";

var paths = {
  'fontawesome': npm_path + '/font-awesome/',
  'jquery': npm_path + '/jquery/dist/',
  'bootstrap': npm_path + '/bootstrap-sass/',
  'sbadmin2': npm_path + '/sb-admin-2/dist/',
  'metismenu' : npm_path + '/metismenu/dist/',
};

elixir(function(mix) {
   mix.sass('app.scss')
        .styles([
            'app.css',
            './resources/assets/css/app.css',
        ], 'public/css/app.css', 'public/css')
        .styles([
            'app.css',
            paths.sbadmin2 + "css/sb-admin-2.min.css",
            paths.metismenu + "metisMenu.min.css",            
            './resources/assets/css/admin.css',
        ], 'public/css/admin.css', 'public/css')
        .copy(paths.fontawesome + 'fonts/**', 'public/build/fonts')
        .scripts([
            paths.jquery + "jquery.min.js",
            paths.bootstrap + "assets/javascripts/bootstrap.min.js",
            'app.js',
        ], 'public/js/app.js', 'resources/assets/js')
        .scripts([
            paths.jquery + "jquery.min.js",
            paths.bootstrap + "assets/javascripts/bootstrap.min.js",
            paths.sbadmin2 + "js/sb-admin-2.min.js",
            paths.metismenu + "metisMenu.min.js",
            'admin.js',
        ], 'public/js/admin.js', 'resources/assets/js')
        .version(["public/css/app.css", "public/js/app.js", "public/css/admin.css", "public/js/admin.js"]);
});