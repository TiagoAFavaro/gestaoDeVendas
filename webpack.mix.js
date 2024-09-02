const mix = require('laravel-mix');

mix.js('resources/js/index.js', 'public/js')
   .sass('resources/css/style-home.scss', 'public/css')
   .babelConfig({
       presets: [
           ['@babel/preset-env', { modules: false }]
       ]
   });
