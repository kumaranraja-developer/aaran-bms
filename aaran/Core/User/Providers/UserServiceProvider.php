<?php

namespace Aaran\Core\User\Providers;

use Aaran\Core\User\Livewire\Class;
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
        $this->registerMigrations();
        $this->registerViews();

         Livewire::component('user::user-list', Class\UserList::class);
         Livewire::component('user::user-detail', Class\UserDetailShow::class);
    }

    private function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'user');
    }
}
