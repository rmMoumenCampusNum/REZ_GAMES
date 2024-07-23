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
        'user_id',
        'category_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }


    public function Order()
    {
        return $this->hasMany(Order::class);

    }

    public function Item()
    {
        return $this->belongsTo(Item::class, 'item_id');


    }
}



