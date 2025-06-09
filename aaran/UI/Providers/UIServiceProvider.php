<?php

namespace Aaran\UI\Providers;

use Aaran\UI\Livewire\Class\Index;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class UIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(UIRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

        // Livewire::component('ui::tenant-setup', TenantSetupWizard::class);

         Livewire::component('ui::tenant-setup', Index::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources', 'Ui'); // Important: Load views from module

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'templates');
    }
}
