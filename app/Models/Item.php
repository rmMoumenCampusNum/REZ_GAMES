<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description', // Assurez-vous d'ajouter toutes les colonnes que vous voulez permettre pour l'assignation en masse
        'price',
        'category_id',
    ];

// Relation avec la table Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

// Relation avec la table Order
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'item_order');
    }

// Relation avec la table Card
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'card_item');
    }
}
