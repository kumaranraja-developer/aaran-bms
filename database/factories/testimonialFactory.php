<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class testimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vname' => $this->faker->name,
            'active_id' => 1
        ];
    }
}
