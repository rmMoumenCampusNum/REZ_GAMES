<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'orders';
    protected $fillable = ['user_id', 'shipments_id'];
    protected $dates = ['created', 'updated'];

    public function Item()
    {
        return $this->hasMany(Item::class);
    }
}
