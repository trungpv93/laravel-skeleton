const elixir = require('laravel-elixir');

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
  'adminlte': npm_path + '/admin-lte/',
  'ionicons': npm_path + '/ionicons/',
  'toastr': npm_path + '/toastr/build/',
  'sweetalert': npm_path + '/sweetalert/dist/',
  'moment': npm_path + '/moment/',
};

elixir(function(mix) {
   mix.styles([
        paths.adminlte + "bootstrap/css/bootstrap.min.css",
        paths.fontawesome + "css/font-awesome.min.css",
        paths.ionicons + "css/ionicons.min.css",
        paths.adminlte + "plugins/jvectormap/jquery-jvectormap-1.2.2.css",
        paths.adminlte + "dist/css/AdminLTE.min.css",
        paths.adminlte + "dist/css/skins/_all-skins.min.css",
        'dashboard.css',
      ], 'public/css/all.css', 'resources/assets/css')
      .styles([
        paths.adminlte + "bootstrap/css/bootstrap.min.css",
        paths.fontawesome + "css/font-awesome.min.css",
        paths.ionicons + "css/ionicons.min.css",
        paths.toastr + "toastr.min.css",
        paths.sweetalert + "sweetalert.css",
        paths.adminlte + "plugins/daterangepicker/daterangepicker.css",
        paths.adminlte + "dist/css/AdminLTE.min.css",
        paths.adminlte + "dist/css/skins/_all-skins.min.css",
        'dashboard.css',
      ], 'public/css/default.css', 'resources/assets/css')
      .styles([
        paths.adminlte + "bootstrap/css/bootstrap.min.css",
        paths.fontawesome + "css/font-awesome.min.css",
        paths.ionicons + "css/ionicons.min.css",
        paths.adminlte + "dist/css/AdminLTE.min.css",
        paths.adminlte + "plugins/iCheck/square/blue.css"
      ], 'public/css/auth.css', 'resources/assets/css')
      .copy(paths.adminlte + 'bootstrap/fonts/**', 'public/build/fonts')
      .copy(paths.fontawesome + 'fonts/**', 'public/build/fonts')
      .copy(paths.ionicons + 'fonts/**', 'public/build/fonts')
      .copy(paths.adminlte + 'dist/img/**', 'public/dist/img')
      .copy('./resources/assets/img/**', 'public/img')
      .copy('./resources/assets/fonts/**', 'public/build/fonts')
      .copy(paths.adminlte + 'plugins/iCheck/square/**', 'public/build/css') /* for auth.css */
      .scripts([
          paths.adminlte + "plugins/jQuery/jquery-2.2.3.min.js",
          paths.adminlte + "bootstrap/js/bootstrap.min.js",
          paths.adminlte + "plugins/fastclick/fastclick.js",
          paths.adminlte + "dist/js/app.min.js",
          paths.adminlte + "plugins/sparkline/jquery.sparkline.min.js",
          paths.adminlte + "plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
          paths.adminlte + "plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
          paths.adminlte + "plugins/slimScroll/jquery.slimscroll.min.js",
          paths.adminlte + "plugins/chartjs/Chart.min.js",
          paths.adminlte + "dist/js/pages/dashboard2.js",
          paths.adminlte + "dist/js/demo.js",
          'dashboard.js',
        ], 'public/js/all.js', 'resources/assets/js')
      .scripts([
          paths.adminlte + "plugins/jQuery/jquery-2.2.3.min.js",
          paths.adminlte + "bootstrap/js/bootstrap.min.js",
          paths.adminlte + "plugins/iCheck/icheck.min.js",
        ], 'public/js/auth.js', 'resources/assets/js')
      .scripts([
          paths.adminlte + "plugins/jQuery/jquery-2.2.3.min.js",
          paths.adminlte + "bootstrap/js/bootstrap.min.js",
          paths.adminlte + "plugins/fastclick/fastclick.js",
          paths.adminlte + "dist/js/app.min.js",
          paths.adminlte + "plugins/sparkline/jquery.sparkline.min.js",
          paths.adminlte + "plugins/slimScroll/jquery.slimscroll.min.js",
          paths.moment + "min/moment.min.js",
          paths.toastr + "toastr.min.js",
          paths.sweetalert + "sweetalert.min.js",
          paths.adminlte + "plugins/daterangepicker/daterangepicker.js",
        ], 'public/js/default.js', 'resources/assets/js')
      .version(["public/css/all.css", "public/js/all.js", "public/css/auth.css", "public/js/auth.js", "public/css/default.css", "public/js/default.js"]);
});
