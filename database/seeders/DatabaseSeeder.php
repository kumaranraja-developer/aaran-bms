<?php

namespace Database\Seeders;

use Aaran\Core\Setup\Database\Seeders\BaseSeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BaseSeeder::class,
        ]);
    }
}
