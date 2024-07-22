<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UserSeeder::class);
        // $this->call(ShipmentSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(CategoriesSeeder::class);
        // $this->call(OrderSeeder::class);
    }
}
