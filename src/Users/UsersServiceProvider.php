<?php

namespace CapstoneLogic\Users;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace('CapstoneLogic\Users')
            ->group(__DIR__ . '/../routes/api.php');
    }
}
