<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Assurez-vous qu'il existe des items avant de créer des catégories
        $item = DB::table('items')->first();

        if ($item) {
            DB::table('_categories')->insert([
                'name' => 'Switch',
                'description' => 'Console de salon créer par Nintendo',
                'item_id' => $item->id, // Utilisez l'ID d'un item existant
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $this->command->info('No items found in items table. Please seed the items table first.');
        }
    }
}
