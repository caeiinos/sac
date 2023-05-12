const mix = require('laravel-mix');

require('./babelExtend');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix
  .copyDirectory('src/assets', 'dist/assets')
  .js('src/scripts/app.js', 'dist/scripts/')
  .sass('src/styles/app.scss', 'dist/styles/')
  .options({
    processCssUrls: false,
    autoprefixer: {
      options: {
        browsers: [
          'chrome <= 60, last 2 firefox versions, last 2 safari versions'
        ],
        grid: true
      }
    }
  })
  .sourceMaps()
  .browserSync({
    proxy: "http://localhost:8080/sac/",
    files: [
      'dist/**/*.css',
      'dist/**/*.js',
      '*.php',
      'utils/*.php',
      'components/*.php'
    ]
  })
  .webpackConfig({
    devtool: 'source-map',
    resolve: {
      modules: [
        'src/scripts',
        'node_modules'
      ]
    },
  })
  .babelExtend();



// disable manifest
Mix.manifest.refresh = function () { return void (0); };