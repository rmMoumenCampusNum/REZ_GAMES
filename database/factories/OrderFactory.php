<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'user_id'=> User::inRandomOrder()->first()->id,
                'item_id'=> Item::inRandomOrder()->first()->id, // Sélectionne un ID aléatoire d'un Item existant,
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
