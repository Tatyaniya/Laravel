<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * сохраняем заказ в базу
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function order(Request $request)
    {
        $order = Order::create([
            'product_id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        $order->save();

        return redirect()->route('home');
    }
}
