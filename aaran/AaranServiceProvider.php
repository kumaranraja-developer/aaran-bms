<?php

namespace Aaran;

use Aaran\Assets\Providers\AssetsServiceProvider;
use Aaran\Dashboard\Providers\DashboardServiceProvider;
use Aaran\Core\Setup\Providers\SetupServiceProvider;
use Aaran\Core\Tenant\Providers\TenantServiceProvider;
use Aaran\Core\User\Providers\UserServiceProvider;
use Aaran\Website\Providers\WebsiteServiceProvider;
use Aaran\UI\Providers\UIServiceProvider;
use Illuminate\Support\ServiceProvider;

class AaranServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(SetupServiceProvider::class);

        $this->app->register(UIServiceProvider::class);

        $this->app->register(TenantServiceProvider::class);

        $this->app->register(UserServiceProvider::class);

        $this->app->register(AssetsServiceProvider::class);

        $this->app->register(WebsiteServiceProvider::class);

        $this->app->register(DashboardServiceProvider::class);

    }

}
