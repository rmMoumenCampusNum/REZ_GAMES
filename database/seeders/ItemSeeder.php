<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{

    public function run(): void
    {
        Item::factory()->count(5)->create();
    }
}
