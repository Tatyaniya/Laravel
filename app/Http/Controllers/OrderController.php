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

        return redirect()->route('send');
    }

    public function send()
    {
        return view('mail', [
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * перейти на страницу заказов
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orders()
    {
        return view('orders', [
                'orders' => Order::all(),
                'is_admin' => $this->admin()
            ]
        );
    }
}
