<?php

namespace Aaran\Assets\Providers;

use Aaran\Assets\Services\ImageService;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AssetsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->getConfig();
    }

    public function register(): void
    {
        $this->app->singleton(ImageService::class, function ($app) {
            return new ImageService();
        });
    }

    public function getConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/aaran.php', 'aaran-app');
        $this->mergeConfigFrom(__DIR__ . '/../Config/software.php', 'software');

        $this->mergeConfigFrom(__DIR__ . '/../Settings/developer.php', 'developer');
    }
}
