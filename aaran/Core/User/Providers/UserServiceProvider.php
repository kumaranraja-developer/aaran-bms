<?php

namespace Aaran\Core\User\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(UserRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

        // Livewire::component('user::tenant-setup', TenantSetupWizard::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'user');
    }
}
