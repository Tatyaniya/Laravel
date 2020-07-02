<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * переходим к списку категорий
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catList()
    {
        $cats = Category::all();

        return view('catlist', [
            'cats' => $cats,
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * переходим к созданию категории
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('createcat', [
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * добавляем категорию
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * редактируем категорию
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cat = Category::query()->find($id);

        return view('editcat', [
            'cat' => $cat,
            'is_admin' => $this->admin()
        ]);
    }

    /**
     * сохраняем категорию
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $cat = Category::query()->find($request->id);

        $cat->name = $request->name;
        $cat->desc = $request->desc;;
        $cat->save();

        return redirect()->route('home');
    }

    /**
     * удаляем категорию
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('home');
    }
}
