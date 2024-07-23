<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {


        DB::table('categories')->insert([
            'name' => 'Switch',
            'description' => 'Console de salon créer par Nintendo',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
