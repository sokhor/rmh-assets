const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
  .webpackConfig({
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'resources/js')
      }
    }
  })
  .sass('resources/sass/app.scss', 'public/css');
