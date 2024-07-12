<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


abstract class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
    }
}
