<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titre');
            $table->string('Description');
            $table->decimal('price', 8, 2);
            $table->foreignId('items_id')->constrained('items')->onDelete('cascade');


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
