<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\TaskImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobImagesFactory extends Factory
{
    protected $model = TaskImage::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
