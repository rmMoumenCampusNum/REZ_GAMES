<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id'); // Ajoute category_id après la colonne id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Définit la clé étrangère avec la table 'categories'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Supprime la relation clé étrangère
            $table->dropColumn('category_id'); // Supprime la colonne
        });
    }
}
