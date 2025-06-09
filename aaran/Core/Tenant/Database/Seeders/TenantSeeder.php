<?php

namespace Aaran\Core\Tenant\Database\Seeders;

use Illuminate\Database\Seeder;
use Aaran\Core\Tenant\Models\Tenant;
use Illuminate\Support\Facades\Crypt;

class TenantSeeder extends Seeder
{
    public function run()
    {
        $tenants = [
            [
                'b_name' => 'Sundar',
                't_name' => 'sundar',
                'email' => 'sundar@sundar.com',
                'active_id' => true,
                'industry_code' => '1000',
            ],
            [
                'b_name' => 'Aaran Software',
                't_name' => 'aaran_software',
                'email' => 'aaran@aaran.org',
                'active_id' => true,
                'industry_code' => '1001',
            ],
            [
                'b_name' => 'Demo Software',
                't_name' => 'demo',
                'email' => 'demo@demo.com',
                'active_id' => true,
                'industry_code' => '1003',
            ],
        ];

        foreach ($tenants as $tenant) {
            Tenant::create(array_merge($tenant, [
                'contact' => '1234567890',
                'phone' => '9876543210',
                'db_name' => $tenant['t_name'] . '_db',
                'db_host' => '127.0.0.1',
                'db_port' => '3306',
                'db_user' => 'root',
                'db_pass' => 'Computer.1', //Crypt::encryptString('password'), --> this would in future
            ]));
        }
    }
}
