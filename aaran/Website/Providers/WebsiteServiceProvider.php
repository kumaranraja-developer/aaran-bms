<?php

namespace Aaran\Website\Providers;

use Aaran\Website\Livewire\Class\About;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class WebsiteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(WebsiteRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

        $this->registerMigrations();

        Livewire::component('contact-form', \Aaran\Website\Livewire\Class\Contact\Index::class);

         Livewire::component('website::about.team', About\Team::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'website');
    }

    private function registerMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

}
