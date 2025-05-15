<?php

namespace Aaran\UI\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class UIRouteProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {

            Route::middleware('web')
                ->group(__DIR__ . '/../Routes/web.php');
        });
    }
}
