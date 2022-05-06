<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Contracts\UserControllerInterface',
            'App\Services\UserService'
        );

        $this->app->bind(
            'App\Contracts\PaymentControllerInterface',
            'App\Services\PaymentService'
        );

    }
}
