<?php

// Déclaration du namespace de la classe Category
namespace App\Models;

// Inclusion des traits et classes nécessaires
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Déclaration de la classe Category qui hérite de Model
class Category extends Model
{
    // Inclusion du trait HasFactory pour utiliser les fonctionnalités des factories
    use HasFactory;

    // Déclaration du nom de la table associée à ce modèle
    public $table = 'categories';

    // Déclaration des attributs pouvant être assignés en masse
    public $fillable = ['name', 'description', 'item_id'];

    // Déclaration de la relation entre Category et Item
    public function item()
    {
        // Une catégorie appartient à un item, la clé étrangère est 'item_id'
        return $this->belongsTo(Item::class, 'item_id');
    }
}
