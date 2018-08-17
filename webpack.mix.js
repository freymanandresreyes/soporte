let mix = require('laravel-mix');

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

mix.scripts([
    'resources/assets/js/global/funciones_globales.js',
    'resources/assets/js/colaboradores/nuevo_colaborador.js',
    'resources/assets/js/colaboradores/buscar_colaborador.js',
    ], 'public/js/compilados.js');
