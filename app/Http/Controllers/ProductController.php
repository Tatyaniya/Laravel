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

        return view('home', [
            'products' => $products,
            'is_admin' => $this->admin()
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
                'is_admin' => $this->admin()
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

        return view('order', [
                'product_id' => $id,
                'name' => $name,
                'email' => $email,
                'is_admin' => $this->admin()
            ]
        );
    }

    public function product($id)
    {
        $product = Product::query()->where('id', '=', $id)->first();

        $other = Product::query()->limit(3)->get();

        return view('product', [
                'id' => $product['id'],
                'name' => $product['name'],
                'desc' => $product['desc'],
                'price' => $product['price'],
                'img' => $product->getImageId(),
                'other' => $other,
                'is_admin' => $this->admin()
            ]
        );
    }




}
