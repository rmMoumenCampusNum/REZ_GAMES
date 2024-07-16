<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function showAllOrders ()
    {
      $orders = Order::all();
      return response()->json($orders);
    }

    public function showOneOrder ($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }
}
