<?php

namespace App\Providers;

use Statamic\Statamic;
use App\Rules\AtLeastOneFieldIfTwo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Statamic::script('app', 'cp.js');
        Statamic::pushCpRoutes(function () {
            Route::namespace('\App\Http\Controllers')->group(function () {
                require base_path('routes/cp.php');
            });
        });
        Validator::extend('at_least_one_field_if_two', function ($attribute, $value) {
            return (new AtLeastOneFieldIfTwo())->passes($attribute, $value);
        });
    }
}
