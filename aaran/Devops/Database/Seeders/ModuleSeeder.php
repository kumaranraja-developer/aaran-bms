<?php

namespace Aaran\Devops\Database\Seeders;

use Aaran\Devops\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{

    public function run(): void
    {
        $cities = [
            '-', 'Master','Sales','Purchase','Receipt',
        ];

        foreach ($cities as $city) {
            Module::create([
                'vname' => $city,
                'description' => '-',
                'active_id' => '1'
            ]);
        }
    }
}
