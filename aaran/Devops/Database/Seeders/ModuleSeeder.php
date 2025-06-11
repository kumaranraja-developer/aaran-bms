<?php

namespace Aaran\Devops\Database\Seeders;

use Aaran\Devops\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{

    public function run(): void
    {
        $modules = [
            '-', 'Feature Ideas','Concept','Bug','Issue',
        ];

        foreach ($modules as $row) {
            Module::create([
                'vname' => $row,
                'description' => '-',
                'active_id' => '1'
            ]);
        }
    }
}
