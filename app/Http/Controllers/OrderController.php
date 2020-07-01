<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        //dd($request['id']);

        $order = Order::create([
            'product_id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        $order->save();

        return redirect()->route('home');
    }
}
