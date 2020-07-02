<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * все товары на главной
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $products = Product::query()->orderBy('id', 'desc')->paginate(9);

        return view('home', [
            'products' => $products,
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * категории
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
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

    /**
     * по кнопке "купить" переход на страницу заказа
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
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

    /**
     * страница 1 товара
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function product($id)
    {
        $product = Product::query()->where('id', '=', $id)->first();

        $other = Product::query()->inRandomOrder()->limit(3)->get();

        return view('product', [
                'product' => $product,
                'other' => $other,
                'is_admin' => $this->admin()
            ]
        );
    }

    /**
     * переход на страницу создания игры
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('create', [
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * добавление игры
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function add(Request $request)
    {
        $catName = $request->get('category');

        $cat = Category::query()->where('name', '=', $catName)->first();

        $product = Product::create([
            'category_id' => $cat->id,
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'email' => $request->get('email'),
            'desc' => $request->get('desc')
        ]);

        $product->save();

        $products = Product::query()->orderBy('id', 'desc')->paginate(9);

        return view('home', [
                'products' => $products,
                'is_admin' => $this->admin()
            ]
        );
    }

    public function edit($id)
    {
        //$book = Book::query()->find($id);
        //dd($id,$book);
        //return view('books.edit', ['book' => $book]);
    }

    public function save(Request $request)
    {


//        $book = Book::query()->find($request->id);
//
//        $book->name = $request->name;
//        $book->price = $request->price;
//        $book->save();
//        return redirect()->route('books');
    }

    public function delete(Request $request)
    {
//        Book::destroy($request->id);
//        return redirect()->route('books');

    }


}
