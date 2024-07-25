<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return "La liste des articles";
    }

    public function show($id)
    {
        return "Item $id";

    }

}
