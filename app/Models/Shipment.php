<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

public function order(){
    return $this->hasOne(Order::class, 'order_id');
}

public function user(){
    return $this->belongsTo(User::class);
}
}
