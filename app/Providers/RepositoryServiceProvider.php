<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\repositories\BusinessRepositoryInterface',
            'App\repositories\BusinessRepository',
        );

        $this->app->bind(
            'App\repositories\UserRepositoryInterface',
            'App\repositories\UserRepository',
        );
    }
}
