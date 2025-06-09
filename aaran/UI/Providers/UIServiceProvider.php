<?php

namespace Aaran\UI\Providers;

use Aaran\UI\Livewire\Class\Index;
use Illuminate\Support\Facades\View;
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

         View::addNamespace('Ui',base_path('aaran/UI/Resources/components'));

        View::addNamespace('Ui', base_path('aaran/UI/Livewire/Views'));

    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources', 'Ui'); // Important: Load views from module

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'templates');

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'show');

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', '/ui/{slug}');
    }
}
