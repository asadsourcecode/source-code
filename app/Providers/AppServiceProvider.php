<?php

namespace App\Providers;

use App\Services\SiteDataService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SiteDataService::class);
    }

    public function boot(): void
    {
        $site = $this->app->make(SiteDataService::class);

        View::share([
            'siteSettings' => $site->settings(),
            'headerMenu'   => $site->headerMenu(),
            'footerMenu'   => $site->footerMenu(),
        ]);
    }
}
