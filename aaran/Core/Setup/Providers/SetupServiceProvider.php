<?php

namespace Aaran\Core\Setup\Providers;

use Aaran\Core\Setup\Console\Commands\AaranMigrateCommand;
use Aaran\Core\Setup\Console\Commands\AaranModule;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class SetupServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            AaranMigrateCommand::class,
            AaranModule::class,
        ]);

        $this->app->register(SetupRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

//        Livewire::component('setup::database-manager', DatabaseManager::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'setup');
    }
}
