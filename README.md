### Install Statamic

        ##install
        1-php artisan config:clear
        2-Add the statamic:install command to post-autoload-dump in composer.json.
            - "@php artisan statamic:install --ansi",
            - "@php artisan statamic:search:update --all --ansi",
            - "@php artisan statamic:static:clear --ansi"
        3-composer require statamic/cms --with-dependencie
        4-go to config/statamic/editions replace false to true
        ##users
        5-go to config/statamic/users replace repository=eloquent to repository=file
        5-go to config/auth replace driver ="eloquent" to drive="statamic" and remove 'model' => App\Models\User::class
        4-create user in cp "php please make:user"

-   custom datafeild :

    -   php please make:fieldtype {{ Name }}
    -   in cp.js ::

        -   import {{ Name }} from "./components/fieldtypes/{{ Name }}";
        -   Statamic.booting(() => {
            Statamic.$components.register("{{ Name smaller and dashed}}-fieldtype", {{ Name }});
            });

    -   npm install laravel-mix@latest --save-dev
    -   npm install vue
    -   npm uninstall vue vue-loader vue-template-compiler ( convert vue 3 to vue 2 )
    -   npm install vue@2
    -   in AppServiceProvider function boot() :: - add Statamic::script('app', 'cp.js');
    -   Replace the vue() code in webpack.mix.js with vue({version: 2})
    -   mix.js('resources/js/cp.js', 'public/vendor/app/js').vue(({ version: 2 }));

    -   For Save File Session ( in env ) :
            SESSION_DRIVER=file

    -   For multi users : ( in vendor\statamic\cms\src\Http\Middleware\CP\CountUsers.php)
            if (! Statamic::pro() && User::count() > 1 && false)
