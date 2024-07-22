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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'Adress' => 'required|string|max:255',
            'Code postale' => 'required|string|max:10',
            'ville' => 'required|string|max:100',
            'password'=> 'required|string|max:55',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
            'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);
            // Create a new user with the validated data
            $user = User::create($request->all());
            // Return a success response with the created user data
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
            ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required', 
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
            'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);
        $user = User::findOrFail($id);

        $user->update($request->all());
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ], 201);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return response()->json([
                'message' => 'User deleted successfully',
                'user' => $user,
            ], 201);
    }
}
