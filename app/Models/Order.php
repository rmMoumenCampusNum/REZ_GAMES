<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'item_id', 'shipments_id', 'created_at', 'updated_at'];


    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function shipment(){
        return $this->belongsTo(Shipment::class, 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
