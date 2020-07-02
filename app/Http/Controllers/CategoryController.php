<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function catList()
    {
        $cats = Category::all();

        return view('catlist', [
            'cats' => $cats,
            'is_admin' => $this->admin()
        ]);
    }

    public function create()
    {
        return view('createcat', [
            'is_admin' => $this->admin()
        ]);
    }

    public function add(Request $request)
    {
        $catName = $request->get('name');


        $cat = Category::query()->where('name', '=', $catName)->first();

        if(isset($cat)) {
            echo 'Такая категория уже существует';
            exit();
        } else {
            $cat = Category::create([
                'name' => $request->get('name'),
                'desc' => $request->get('desc')
            ]);

            $cat->save();

            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        $cat = Category::query()->find($id);

        return view('editcat', [
            'cat' => $cat,
            'is_admin' => $this->admin()
        ]);
    }

    public function save(Request $request)
    {
        $cat = Category::query()->find($request->id);

        $cat->name = $request->name;
        $cat->desc = $request->desc;;
        $cat->save();

        return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('home');
    }
}
