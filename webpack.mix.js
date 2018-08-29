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

mix.scripts(
  [
    "resources/assets/js/global/funciones_globales.js",
    "resources/assets/js/colaboradores/nuevo_colaborador.js",
    "resources/assets/js/colaboradores/buscar_colaborador.js",
    "resources/assets/js/colaboradores/crear_colaborador.js",
    "resources/assets/js/colaboradores/agregar_area_colaborador.js",
    "resources/assets/js/colaboradores/estado_colaborador.js",
    "resources/assets/js/orden/agregar_item.js",
    "resources/assets/js/orden/guardar_orden.js",
    "resources/assets/js/aceptar_orden/ver_orden.js",
    "resources/assets/js/aceptar_orden/aceptar_orden.js",
    "resources/assets/js/designados/distribuir.js",
    "resources/assets/js/designados/asignar.js",
    "resources/assets/js/terminar_item/terminar_item.js"
  ],
  "public/js/compilados.js"
);
