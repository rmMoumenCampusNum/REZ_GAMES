<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    
   public function showOne(string $id)
   {
       return response()->json(Shipment::findOrFail($id));
   }
   public function showAll()
   {

       return response()->json(Shipment::all());
   }
   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       // Validate the incoming request data
       $request->validate([
           'id' => 'required|integer|max:255',
           'created_at' => 'nullable|date_format:Y-m-d H:i:s',
           'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
       ]);
           // Create a new user with the validated data
           $shipment = Shipment::create($request->all());
           // Return a success response with the created user data
           return response()->json([
               'message' => 'Shipment created successfully',
               'Shipemnt' => $shipment,
           ], 201);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
       $request->validate([
        'id' => 'required|integer|max:255',
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
        'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
       ]);
       $shipment = Shipment::findOrFail($id);

       $shipment->update($request->all());
       return response()->json([
           'message' => 'Shipment updated successfully',
           'shipment' => $shipment,
       ], 201);
   }
 
   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
       $shipment = Shipment::find($id)->delete();
       return response()->json([
               'message' => 'Shipment deleted successfully',
               'shipemnt' => $shipment,
           ], 201);
   }
}


