<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Inclusion du trait HasFactory pour utiliser les fonctionnalités des factories
    use HasFactory;

    // Déclaration du nom de la table associée à ce modèle
    public $table = 'categories';

    // Déclaration des attributs pouvant être assignés en masse
    public $fillable = ['name', 'description', 'item_id'];

    public function items (){
        return $this->hasMany(Item::class);
    // Déclaration de la relation entre Category et Item
    public function item()
    {
        // Une catégorie appartient à un item, la clé étrangère est 'item_id'
        return $this->belongsTo(Item::class, 'item_id');
    }


}
