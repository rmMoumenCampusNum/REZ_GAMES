<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [

            'description' => fake()->paragraph(),
            'title' => fake()->word(),
            'price' => fake()->randomFloat(2, 10, 100), // Prix aléatoire entre 10 et 100 avec 2 décimales
            'image' =>fake()->imageUrl(),
        ];
    }
}
