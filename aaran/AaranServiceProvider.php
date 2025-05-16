<?php

namespace Aaran;

use Aaran\Assets\Providers\AssetsServiceProvider;
use Aaran\BMS\Billing\Baseline\Providers\BaselineServiceProvider;
use Aaran\BMS\Billing\Books\Providers\BooksServiceProvider;
use Aaran\BMS\Billing\Common\Providers\CommonServiceProvider;
use Aaran\BMS\Billing\Entries\Providers\EntriesServiceProvider;
use Aaran\BMS\Billing\Master\Providers\MasterServiceProvider;
use Aaran\BMS\Billing\Reports\Providers\ReportsServiceProvider;
use Aaran\BMS\Billing\Transaction\Providers\TransactionServiceProvider;
use Aaran\Dashboard\Providers\DashboardServiceProvider;
use Aaran\Core\Setup\Providers\SetupServiceProvider;
use Aaran\Core\Tenant\Providers\TenantServiceProvider;
use Aaran\Core\User\Providers\UserServiceProvider;
use Aaran\Website\Providers\WebsiteServiceProvider;
use Aaran\UI\Providers\UIServiceProvider;
use Illuminate\Support\ServiceProvider;

class AaranServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(SetupServiceProvider::class);

        $this->app->register(UIServiceProvider::class);

        $this->app->register(TenantServiceProvider::class);

        $this->app->register(UserServiceProvider::class);

        $this->app->register(AssetsServiceProvider::class);

        $this->app->register(WebsiteServiceProvider::class);

        $this->app->register(DashboardServiceProvider::class);

        $this->app->register(BaselineServiceProvider::class);

        $this->app->register(BooksServiceProvider::class);

        $this->app->register(CommonServiceProvider::class);

        $this->app->register(EntriesServiceProvider::class);

        $this->app->register(MasterServiceProvider::class);

        $this->app->register(ReportsServiceProvider::class);

        $this->app->register(TransactionServiceProvider::class);


    }

}
