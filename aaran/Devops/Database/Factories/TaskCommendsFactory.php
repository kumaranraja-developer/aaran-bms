<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\TaskCommends;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskCommendsFactory extends Factory
{
    protected $model = TaskCommends::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
