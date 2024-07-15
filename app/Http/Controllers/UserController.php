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
    public function showAll()
    {
        return
            ["idUsers" => 1,
                "name" => "Johan Dupont",
                "email" => "johan.dupont@example.com",
                "password" => "hashedpassword123",
                "created_date" => "2024-01-15T08:30:00Z",
                "date_de_naissance" => "2002-05-12",
                "Adresse" => "123 Rue de la Paix",
                "CP" => "75001",
                "Ville" => "Paris"];
    }
}
