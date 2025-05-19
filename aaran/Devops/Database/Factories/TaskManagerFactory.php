<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskManagerFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
