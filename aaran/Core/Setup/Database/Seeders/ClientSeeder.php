<?php

namespace Aaran\Core\Setup\Database\Seeders;

use Aaran\BMS\Billing\Books\Database\Seeders\BooksSeeder;
use Aaran\BMS\Billing\Common\Database\Seeders\CommonSeeder;
use Aaran\BMS\Billing\Master\Database\Seeders\MasterSeeder;
use Aaran\BMS\Billing\Baseline\Database\Seeders\DefaultCompanySeeder;
use Aaran\Devops\Database\Seeders\ModuleSeeder;
use Aaran\Neot\Database\Seeders\ChatbotIntentSeeder;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CommonSeeder::class,
            BooksSeeder::class,
            MasterSeeder::class,
            DefaultCompanySeeder::class,
            ModuleSeeder::class,
//            ChatbotIntentSeeder::class,
        ]);
    }
}
