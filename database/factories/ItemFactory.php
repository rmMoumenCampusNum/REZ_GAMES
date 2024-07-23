<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'id' => null,
            'titre' => $this->faker->sentence,
            'Description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'created_at' => now(),
            'updated_at' => now(),
            'category_id' => 1,


        ];
    }
}
