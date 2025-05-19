<?php

namespace Aaran\Devops\Database\Factories;

use Aaran\Devops\Models\JobImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobImagesFactory extends Factory
{
    protected $model = JobImages::class;

    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
