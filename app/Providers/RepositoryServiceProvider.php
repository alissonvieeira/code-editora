<?php

namespace CodePub\Providers;

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
        $this->app->bind(\CodePub\Repositories\CategoryRepository::class, \CodePub\Repositories\CategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
