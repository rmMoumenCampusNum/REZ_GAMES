<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assure-toi qu'il y a des catégories dans la base de données
        // Si tu as un CategorySeeder, exécute-le avant, sinon crée des catégories ici

        // Exemple de création de catégories
        Category::factory()->count(5)->create(); // Crée 5 catégories aléatoires

        // Récupère les catégories
        $categories = Category::all();

        // Crée des articles et assigne-les à des catégories
        foreach ($categories as $category) {
            Item::factory()->count(10)->create([ // Crée 10 articles par catégorie
                'category_id' => $category->id, // Associe chaque article à une catégorie
            ]);
        }
    }
}
