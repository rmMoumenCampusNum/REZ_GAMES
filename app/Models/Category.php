<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Déclaration du nom de la table associée à ce modèle
    protected $table = 'categories';

    // Déclaration des attributs pouvant être assignés en masse
    protected $fillable = ['name', 'description'];

    // Déclaration de la relation entre Category et Item
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}
