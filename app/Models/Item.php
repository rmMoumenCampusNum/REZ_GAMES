<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'price', 'category_id']; // Ajoute category_id ici

    // Relation avec la catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
