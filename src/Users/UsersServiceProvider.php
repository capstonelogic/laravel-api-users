<?php

namespace CapstoneLogic\Users;

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
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Route::prefix('api/users')
            ->middleware('api')
            ->namespace('CapstoneLogic\Users')
            ->group(__DIR__ . '/../../routes/api.php');
    }
}
