<?php

namespace Aaran\Core\Setup\Database\Seeders;

use Aaran\Core\Tenant\Database\Seeders\FeatureSeeder;
use Aaran\Core\Tenant\Database\Seeders\PlanFeatureSeeder;
use Aaran\Core\Tenant\Database\Seeders\PlanSeeder;
use Aaran\Core\Tenant\Database\Seeders\SubscriptionSeeder;
use Aaran\Core\Tenant\Database\Seeders\TenantSeeder;
use Aaran\Core\User\Database\Seeders\UserSeeder;
use Aaran\Website\Database\Seeders\DevTeamSeeder;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TenantSeeder::class,
            UserSeeder::class,
            PlanSeeder::class,
            FeatureSeeder::class,
            PlanFeatureSeeder::class,
            SubscriptionSeeder::class,
//            DevTeamSeeder::class,

        ]);
    }
}
