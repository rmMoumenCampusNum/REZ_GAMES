<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class UserController extends Controller
{
    //
    public function showOne(string $id)
    {
        return "User controller Ok with $id";
    }
    public function showAll()
    {

        return "User controller Ok for all";

    }
}
