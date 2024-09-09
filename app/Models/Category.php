<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Définir la relation avec les items
    public function items()
    {
        return $this->hasMany(Item::class); // Assure-toi que cette relation est correcte
    }
}
