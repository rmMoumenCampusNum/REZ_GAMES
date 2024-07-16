<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $title = $this->faker->sentence();


        return [

            'title' => $title,
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
