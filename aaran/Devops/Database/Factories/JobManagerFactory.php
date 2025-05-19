<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobManagerFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
