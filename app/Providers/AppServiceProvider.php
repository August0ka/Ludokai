<?php

namespace App\Providers;

use App\View\Components\BeautifulAlert;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

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
        if(env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Carbon::setLocale('pt_BR');
        Blade::component('package-beautiful-alert', BeautifulAlert::class);
    }
}
