<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function showAllOrders ()
    {
      return response()->json(Order::all());
    }

    public function showOneOrder ($id)
    {
        return response()->json(Order::find($id));
    }

    public function createOrder (Request $request){
        $order = new Order();
    }
}
