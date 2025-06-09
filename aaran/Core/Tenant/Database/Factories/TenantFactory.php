<?php

namespace Aaran\Core\Tenant\Database\Factories;

use Aaran\Core\Tenant\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition()
    {
        return [
            'b_name' => $this->faker->company,
            't_name' => $this->faker->unique()->slug,
            'email' => $this->faker->unique()->safeEmail,
            'contact' => $this->faker->phoneNumber,
            'phone' => $this->faker->phoneNumber,
            'db_name' => $this->faker->unique()->slug,
            'db_host' => '127.0.0.1',
            'db_port' => '3306',
            'db_user' => 'tenant_user',
            'db_pass' => Crypt::encryptString('password'),
            'industry_code' => $this->faker->unique()->randomNumber(),
            'migration_status' => 'pending',
            'active_id' => true,
        ];
    }
}
