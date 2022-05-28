<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

class CategoryController extends Controller
{
    //Kategóriák megjelenítése
    public function index()
    {
        return view('category.index', [
            'categories' => category::Paginate(10)
        ]);

    }

    //Kategóriák hozzáadása hozzáadása lap
    public function create()
    {
        return view('category.create');
    }

    //Új kategória tárolása
    public function store(StorecategoryRequest $request)
    {
        category::create($request->validated());
        return redirect()->route('categories');
    }

    //Kategória módosítása lap
    public function edit(category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    //Kategória módosítása
    public function update(UpdatecategoryRequest $request, $id)
    {
        $category = category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories');
    }

    //Kategória törlése
    public function destroy($id)
    {
        category::find($id)->delete();
        return redirect()->route('categories');
    }
}
