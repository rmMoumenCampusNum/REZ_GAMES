<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showOne(string $id)
    {
        return "User controller Ok with $id";
    }
    public function showAll(){
        return ['Tableau' => 'La liste des clients'];
    }
}
