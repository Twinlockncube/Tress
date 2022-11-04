const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/* mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/bootstrap.js', 'public/js');
   .vue()
    .sass('resources/sass/app.scss', 'public/css');*/
    mix.scripts(['node_modules/bootstrap/dist/js/bootstrap.js',
                'node_modules/datatables.net/js/jquery.dataTables.min.js',
                'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
                'node_modules/jszip/dist/jszip.min.js',
                'node_modules/pdfmake/build/pdfmake.min.js',
                'node_modules/datatables.net-buttons/js/buttons.html5.min.js',
                'node_modules/datatables.net-buttons/js/buttons.print.min.js',
                'node_modules/pdfmake/build/vfs_fonts.js',
                'node_modules/sweetalert/dist/sweetalert.min.js',
                ],'public/js/app.js')
       .scripts(['node_modules/jquery/dist/jquery.min.js'],'public/js/jquery.js')
       .styles(['node_modules/bootstrap/dist/css/bootstrap.css',
                'node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
                'node_modules/datatables.net-buttons-dt/css/buttons.dataTables.min.css'],'public/css/app.css')
