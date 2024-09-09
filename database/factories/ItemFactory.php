<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(3), // Titre de l'article
            'description' => $this->faker->paragraph, // Description de l'article
            'price' => $this->faker->randomFloat(2, 10, 200), // Prix aléatoire entre 10 et 200
            'category_id' => Category::factory(), // Associe à une catégorie aléatoire
        ];
    }
}
