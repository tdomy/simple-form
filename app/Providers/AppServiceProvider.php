<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ReCaptcha\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReCaptcha::class, function ($app) {
            return new ReCaptcha(config('services.recaptcha.secret'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
