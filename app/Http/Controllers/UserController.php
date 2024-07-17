<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class UserController extends Controller
{
    /**
     * Fonction Read du CRUD
     */
    public function showOne(string $id)
    {
        return response()->json(User::findOrFail($id));
    }
    public function showAll()
    {

        return response()->json(User::all());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return "Nouvelle entrée crée";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request()->validate(User::$rules);
        $user = User::create($request->all());
        return "Stored";
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return "user effacé";
    }
}
