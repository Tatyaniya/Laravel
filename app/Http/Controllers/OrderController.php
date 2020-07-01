<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        dd($request);

        $order = new Order();
        $order->product_id = $request->get('product->id');
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $book->save();

        return redirect()->route('home');
    }
}
