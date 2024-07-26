<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
   // Affiche la liste des items
   public function index()
   {
       $users = User::all();
       return view('users.index', compact('user'));
   }

   // Affiche un item spécifique par son ID
   public function show($id)
   {
       $user = User::find($id);

       if ($user) {
           return view('users.show', compact('user'));
       } else {
           return redirect()->route('users.index')->with('error', 'Item not found');
       }
   }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'Adress' => 'nullable|string|max:255', // Champs nullable
            'Code postale' => 'nullable|string|max:10', // Champs nullable
            'ville' => 'nullable|string|max:100', // Champs nullable
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
            'Adress' => 'nullable|string|max:255', // Champs nullable
            'Code postale' => 'nullable|string|max:10', // Champs nullable
            'ville' => 'nullable|string|max:100', // Champs nullable
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
