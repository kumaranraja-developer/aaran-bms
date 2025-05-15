<?php

namespace Aaran;

use Aaran\Core\Setup\Providers\SetupServiceProvider;
use Illuminate\Support\ServiceProvider;

class AaranServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(SetupServiceProvider::class);
    }

}
