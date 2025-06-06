<?php

namespace Aaran;

use Aaran\Assets\Providers\AssetsServiceProvider;
use Aaran\Blog\Providers\BlogServiceProvider;
use Aaran\BMS\Billing\Baseline\Providers\BaselineServiceProvider;
use Aaran\BMS\Billing\Books\Providers\BooksServiceProvider;
use Aaran\BMS\Billing\Common\Providers\CommonServiceProvider;
use Aaran\BMS\Billing\Entries\Providers\EntriesServiceProvider;
use Aaran\BMS\Billing\Master\Providers\MasterServiceProvider;
use Aaran\BMS\Billing\Reports\Providers\ReportsServiceProvider;
use Aaran\BMS\Billing\Transaction\Providers\TransactionServiceProvider;
use Aaran\Core\Settings\Providers\SettingsServiceProvider;
use Aaran\Dashboard\Providers\DashboardServiceProvider;
use Aaran\Core\Setup\Providers\SetupServiceProvider;
use Aaran\Core\Tenant\Providers\TenantServiceProvider;
use Aaran\Core\User\Providers\UserServiceProvider;
use Aaran\Devops\Providers\DevopsServiceProvider;
use Aaran\ExternalPartners\Razorpay\Providers\RazorpayServiceProvider;
use Aaran\MasterGst\Providers\MasterGstServiceProvider;
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

        $this->app->register(DevopsServiceProvider::class);

        $this->app->register(RazorpayServiceProvider::class);

        $this->app->register(MasterGstServiceProvider::class);

        $this->app->register(BlogServiceProvider::class);

        $this->app->register(SettingsServiceProvider::class);

    }

}
