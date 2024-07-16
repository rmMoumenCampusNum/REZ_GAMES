<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $filable = ['title', 'decription', 'email'];
,
    public function Card()
    {
    return $this->belongsTo(Card::class);
    }
}