const path = require('path');
const mix = require('laravel-mix');
const TerserPlugin = require('terser-webpack-plugin');

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

mix.webpackConfig({
    devtool: mix.inProduction() ? false : 'source-map',
    resolve: {
        extensions: ['.js', '.jsx', '.vue'],
        alias: {
            ziggy: path.resolve('vendor/tightenco/ziggy/src/js'),
            vue$: 'vue/dist/vue.runtime.esm.js',
            '@': path.resolve('resources/assets/js'),
        },
    },
    optimization: {
        minimize: mix.inProduction(),
        minimizer: [
            new TerserPlugin ({
                cache: true,
                parallel: false,
                extractComments: false,
                sourceMap: !mix.inProduction(),
                terserOptions: {
                    compress: mix.inProduction(),
                },
            }),
        ],
    },
})
    .sass('resources/assets/sass/app.scss', 'css')
    .js('resources/assets/js/app.js', 'js')
    .vue()
    .extract(['vue', 'moment', 'axios', 'bootstrap-vue'])
    .version()
    .setPublicPath('public_html');
