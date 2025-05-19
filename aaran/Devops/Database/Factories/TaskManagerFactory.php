<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\TaskManager;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskManagerFactory extends Factory
{
    protected $model = TaskManager::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
