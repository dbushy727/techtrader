var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.scripts(['metisMenu.js', 'sb-admin-2.js', 'techtrader.js']);
    mix.styles(['metisMenu.min.css', 'sb-admin-2-timeline.css', 'sb-admin-2.css', 'app.css']);
});
