<?php

namespace Aaran\MasterGst\Providers;

use Aaran\Devops\Providers\DevopsRouteProvider;
use Aaran\MasterGst\Livewire\Class\Authenticate;
use Aaran\MasterGst\Providers\MasterGstRouteServiceProvider;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class MasterGstServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(DevopsRouteProvider::class);
    }

    public function boot(): void
    {
//        $this->registerViews();
//        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config.php','common');
        $this->loadViewsFrom(__DIR__.'/../Livewire/View', 'master-gst');

        $this->app->register(MasterGstRouteServiceProvider::class);
        Livewire::component('master-gst.authenticate', \Aaran\MasterGst\Livewire\Class\Authenticate::class);
    }

//    private function registerViews()
//    {
//        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'master-gst');
//    }
}
