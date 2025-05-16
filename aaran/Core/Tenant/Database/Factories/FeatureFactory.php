<?php

namespace Aaran\Core\Tenant\Database\Factories;

use Aaran\Core\Tenant\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    public function definition()
    {
        return [
            'vname' => $this->faker->company,
            'code' => $this->faker->unique()->numerify('###'),
            'description' => $this->faker->sentence(20),
            'active_id' => true,
        ];
    }
}

