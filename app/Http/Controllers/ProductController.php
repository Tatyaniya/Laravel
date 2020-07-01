<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Request;
use App\Product;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('id', 'desc')->paginate(9);

        //dd($products);
        return view('home', [
            'products' => $products,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category($id)
    {
        $products = Product::query()->where('category_id', '=', $id)->get();
        return view('category', [
                'products' => $products,
            ]
        );
    }

    public function buy($id)
    {
        $userId = Auth::id();

        $user = new User();
        $current = $user->getId($userId);

        $name = $current->name;
        $email = $current->email;

        //dd($id);
        return view('order', [
                'product_id' => $id,
                'name' => $name,
                'email' => $email,
            ]
        );
    }


}
