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
    'resources/assets/js/areas/crear_area.js',
    'resources/assets/js/buscar_area_editar/editar_area.js',
    'resources/assets/js/guardar_editar_area/guardar_editar.js',
    'resources/assets/js/quitar_area_lider/quitar_area_lider.js',
    'resources/assets/js/buscar_lider_area/buscar_lider_area.js',
    'resources/assets/js/estados/abrir_modal_estados.js',
    'resources/assets/js/estados/guardar_estados.js',
    'resources/assets/js/estados/abrir_modal_editar.js',
    'resources/assets/js/estados/input_estado.js',
    'resources/assets/js/estados/guardar_editado.js',
    'resources/assets/js/ordenes/crear_orden.js',

    ], 'public/js/compilados.js');
