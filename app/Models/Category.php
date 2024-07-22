<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';
    public $fillable = ['name', 'description', 'item_id'];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }


}
