var elixir = require('laravel-elixir');
var gulp = require("gulp");
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'bootstrap': './node_modules/bootstrap-sass/assets/',
    'font_awesome': './node_modules/font-awesome/',
    'jquery': './node_modules/jquery/dist/',
    'tooltipster': './resources/assets/tooltipster/',
    'froala': './resources/assets/froala/'
}

elixir(function (mix) {
    mix.sass(['app.scss', 'admin.scss', 'reader.scss', 'bootstrap.scss', 'font-awesome.scss'], 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/', paths.font_awesome + 'scss/']})
        .copy(paths.font_awesome + 'fonts', "./public/fonts/")
        .copy(paths.bootstrap + 'fonts', "./public/fonts/")
        .copy(paths.jquery + "jquery.min.map", "./public/js/jquery.min.map")
        .copy(paths.tooltipster + 'css/tooltipster.css', "./public/css/tooltipster.css")
        .copy(paths.tooltipster + 'css/themes/tooltipster-shadow.css', "./public/css/tooltipster-shadow.css")
        .copy(paths.froala + 'css/froala_content.css', "./public/css/froala_content.css")
        .copy(paths.froala + 'css/froala_style.css', "./public/css/froala_style.css")
        .copy(paths.froala + 'css/froala_editor.css', "./public/css/froala_editor.css")
        .copy(paths.froala + 'css/themes/dark.css', "./public/css/froala_dark.css")
        .copy(paths.tooltipster + 'js/jquery.tooltipster.js', "./public/js/tooltipster.min.js")
        .styles(['bootstrap.css', 'font-awesome.css', 'tooltipster.css', 'tooltipster-shadow.css'], 'public/css/dependencies.css', 'public/css')
        .styles(['froala_style.css', 'froala_content.css', 'reader.css'], 'public/css/reader_dependencies.css', 'public/css')
        .styles(['froala_editor.css', 'froala_dark.css'], 'public/css/edition_dependencies.css', 'public/css')
        .scripts(
        [
            'jquery/dist/jquery.js',
            'bootstrap-sass/assets/javascripts/bootstrap.js'
        ],
        'public/js/dependencies.min.js',
        'node_modules'
        )
        .scripts('dokoiko.js', 'public/js/dokoiko.min.js', 'resources/assets/javascripts')
        .scripts('admin.js', 'public/js/admin.min.js', 'resources/assets/javascripts')
        .scripts('bootbox.min.js', 'public/js/bootbox.min.js', 'resources/assets/javascripts')
        .scripts(
        [
            'modernizr.min.js',
            'reader.js'
        ],
        'public/js/reader_dependencies.min.js',
        'resources/assets/javascripts'
        )
        .scripts(
        [
            'froala_editor.min.js',
            'plugins/tables.min.js',
            'plugins/lists.min.js',
            'plugins/colors.min.js',
            'plugins/media_manager.min.js',
            'plugins/font_family.min.js',
            'plugins/font_size.min.js',
            'plugins/block_styles.min.js',
            'plugins/video.min.js',
            'plugins/file_upload.min.js',
            'plugins/char_counter.min.js'
        ],
        'public/js/edition_dependencies.min.js',
        'resources/assets/froala/js'
        )
        .scripts(
        [
            'jquery.waitforimages.min.js',
            'jquery.prettyembed.min.js',
            'imagesloaded.pkgd.min.js',
            'masonry.pkgd.min.js'
        ],
        'public/js/videos_dependencies.min.js',
        'resources/assets/javascripts'
        )
        .phpUnit();
});
