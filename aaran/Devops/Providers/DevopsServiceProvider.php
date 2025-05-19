<?php

namespace Aaran\Devops\Providers;

use Aaran\Devops\Livewire\Class\JobImagesList;
use Aaran\Devops\Livewire\Class\JobManagerList;
use Aaran\Devops\Livewire\Class\TaskCommendsList;
use Aaran\Devops\Livewire\Class\TaskManagerList;
use Aaran\Devops\Livewire\Class\TaskReplyList;
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
         Livewire::component('job-managers-list', JobManagerList::class);
         Livewire::component('task-managers-list', TaskManagerList::class);
         Livewire::component('task-commends-list', TaskCommendsList::class);
         Livewire::component('task-reply-list', TaskReplyList::class);
         Livewire::component('job-images-list', JobImagesList::class);

        // Livewire::component('devops::tenant-setup', TenantSetupWizard::class);
    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'devops');
    }
}
