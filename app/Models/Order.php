<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'shipments_id', 'created_at', 'updated_at'];


    public function Item()
    {
        return $this->hasMany(Item::class);
    }

    public function Shipment(){
        return $this->belongsTo(Shipment::class);
    }
}
