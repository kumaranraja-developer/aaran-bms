<?php

namespace Aaran\Core\Settings\Providers;

use Aaran\Core\Settings\Livewire\Class\Settings;
use Aaran\Core\Setup\Console\Commands\AaranMigrateCommand;
use Aaran\Core\Setup\Console\Commands\AaranModel;
use Aaran\Core\Setup\Console\Commands\AaranModule;
use Aaran\Core\Setup\Livewire\Class\DatabaseManager;
use Aaran\Core\Setup\Livewire\Class\TenantMigration;
use Aaran\Core\Setup\Livewire\Class\TenantSetupWizard;
use Aaran\Core\Setup\Providers;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class  SettingsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            AaranMigrateCommand::class,
            AaranModule::class,
            AaranModel::class,
        ]);

        $this->app->register(SettingsRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();


        Livewire::component('settings::settings', Settings::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'settings');

    }
}
