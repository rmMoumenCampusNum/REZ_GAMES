<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'shipments_id', 'created_at', 'updated_at'];


    public function items ()
    {
        return $this->belongsToMany(Item::class, 'item_order');
    }
}
