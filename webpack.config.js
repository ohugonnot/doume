var Encore = require('@symfony/webpack-encore');
var webpack = require('webpack');

Encore
    // directory where compiled assets will be stored
    .setOutputPath('web/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .createSharedEntry('app', './assets/js/app.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()
    // provide jquery for select2 and other lib need global Jquery
    .addPlugin(new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/))
    .autoProvidejQuery()
    .enableVueLoader()
    .enableSassLoader()
    .enableSourceMaps(!Encore.isProduction())
    .cleanupOutputBeforeBuild()
    .enableVersioning(Encore.isProduction())
;

module.exports = Encore.getWebpackConfig();