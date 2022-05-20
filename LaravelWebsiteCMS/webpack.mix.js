const mix = require('laravel-mix');

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

let productionSourceMaps = true;
    mix.js('resources/js/app.js', 'public/js')
    
    .sass('public/assets/front/scss/style.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/brown.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/brickred.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/green.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/purple.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/darkbrown.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/bilobaflower.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/lightblue.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/pink.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/red.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/panetone.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/lightbrown.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/lightpink.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/smokegray.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/parrot.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/ferozi.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/moss.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/lightferozi.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/seapink.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/darkblue.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/darkgray.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/orange.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/voiltsky.scss', 'public/assets/front/css/',  [
        //
    ])
    .sass('public/assets/front/scss/yellow.scss', 'public/assets/front/css/',  [
        //
    ])
    
   .sass('public/assets/scss/style.scss', 'public/assets/css/',  [
        //
    ])
    .sourceMaps(productionSourceMaps, 'source-map');
    
