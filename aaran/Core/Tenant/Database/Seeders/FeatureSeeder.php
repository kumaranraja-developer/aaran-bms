<?php

namespace Aaran\Core\Tenant\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            ['code' => '100', 'vname' => 'User roles', 'description' => 'Choose from predefined user roles or tailor permission by defining custom roles', 'active_id' => true],
        ];


        DB::table('features')->insert($features);
    }
}
