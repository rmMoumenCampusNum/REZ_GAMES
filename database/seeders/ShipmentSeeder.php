<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Récupérer un order_id existant depuis la table orders
        $orderId = DB::table('orders')->inRandomOrder()->value('id'); // Sélectionne un id aléatoire

        // Insérer des données dans la table shipments
        DB::table('shipments')->insert([
            'order_id' => $orderId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
