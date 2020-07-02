<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
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
        $cat = Category::query()->find($id);
        $products = Product::query()->where('category_id', '=', $id)->get();

        return view('category', [
                'cat' => $cat->name,
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
    public function add(ProductRequest $request)
    {
        $catName = $request->get('category');

        $cat = Category::query()->where('name', '=', $catName)->first();

        if(isset($cat)) {
            $product = Product::create([
                'category_id' => $cat->id,
                'name' => $request->get('name'),
                'price' => $request->get('price'),
                'email' => $request->get('email'),
                'desc' => $request->get('desc')
            ]);

            $product->save();

            return redirect()->route('home');
        } else {
            echo 'Такой категории нет';
            exit();
        }
    }

    /**
     * переход на страницу редактировани товара
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $product = Product::query()->find($id);
        $cat = Category::query()->find($product->category_id);

        return view('edit', [
            'product' => $product,
            'category' => $cat['name'],
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * сохранение товара
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(ProductRequest $request)
    {
        $product = Product::query()->find($request->id);

        $cat = Category::query()->where('name', '=', $request->category)->first();

        if (isset($cat->id)) {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->desc = $request->desc;
            $product->category_id = $cat->id;
            $product->save();

            return redirect()->route('home');
        } else {
            echo 'Такой категории нет';
        }
    }

    /**
     * удаление товара
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('home');
    }
}
