<?php

namespace Aaran\Assets\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AssetsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(AssetsRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

        // Livewire::component('assets::tenant-setup', TenantSetupWizard::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'assets');
    }
}
