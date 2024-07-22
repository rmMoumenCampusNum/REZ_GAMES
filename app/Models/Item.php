<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public mixed $name;
    protected $fillable = [
        'titre',
        'Description',
        'price',

    ];

    public function categories(){
        return $this->hasMany(Category::class, 'item_id');
    }

}
