<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\TaskReply;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskReplyFactory extends Factory
{
    protected $model = TaskReply::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
