<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->sentence,
            'slug' => str($name)->slug(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
