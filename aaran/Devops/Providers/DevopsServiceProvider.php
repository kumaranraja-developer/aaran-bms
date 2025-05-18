<?php

namespace Aaran\Devops\Providers;

use Aaran\Devops\Livewire\Class\JobManagerList;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DevopsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(DevopsRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();
         Livewire::component('job-manager-list', JobManagerList::class);

        // Livewire::component('devops::tenant-setup', TenantSetupWizard::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'devops');
    }
}
