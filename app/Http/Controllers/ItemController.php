<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


abstract class ItemController extends Controller
{
    public function index()
    {
        return "Liste des produits ";
    }
}
