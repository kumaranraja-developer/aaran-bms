<?php

namespace Aaran\Dashboard\Providers;

use Aaran\Dashboard\Livewire\Class;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DashboardServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(DashboardRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

         Livewire::component('dashboard::sales-chart', Class\SalesChart::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'dashboard');
    }
}
