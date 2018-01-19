<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BikeRepository::class, \App\Repositories\BikeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RiderRepository::class, \App\Repositories\RiderRepositoryEloquent::class);
        //:end-bindings:
    }
}
