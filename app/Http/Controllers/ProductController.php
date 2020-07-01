<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('id', 'desc')->paginate(9);

        //dd($products);
        return view('home', ['products' => $products]);
    }
}
