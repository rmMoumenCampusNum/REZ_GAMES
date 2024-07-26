<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Authenticatable

{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'users';


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
    public function Cart()
    {
        return $this->belongsTo(Card::class);
    }
}
