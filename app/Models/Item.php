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
        return $this->belongsTo(Category::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }

}



