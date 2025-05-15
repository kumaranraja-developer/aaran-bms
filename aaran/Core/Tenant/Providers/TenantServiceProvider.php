<?php

namespace Aaran\Core\Tenant\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class TenantServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(TenantRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

        // Livewire::component('tenant::tenant-setup', TenantSetupWizard::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'tenant');
    }
}
