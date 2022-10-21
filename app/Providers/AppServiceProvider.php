<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Receipt;
use Laravel\Paddle\Subscription;

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
        $this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        view()->composer('lang.lang', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });

    }
}
