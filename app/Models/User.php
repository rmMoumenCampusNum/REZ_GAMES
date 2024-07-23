<?php

namespace App\Models;

use Illuminate\Http\Auth\AuthController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


    protected $table = 'users';


    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];
}
