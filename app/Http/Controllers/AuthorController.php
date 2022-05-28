<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\StoreauthorRequest;
use App\Http\Requests\UpdateauthorRequest;

class AuthorController extends Controller
{
    //Listázás
    public function index()
    {
        return view('author.index', [
            'authors' => author::Paginate(10)
        ]);
    }

    //Új author
    public function create()
    {
        return view('author.create');
    }

    //Új author tárolása
    public function store(StoreauthorRequest $request)
    {
        author::create($request->validated());

        return redirect()->route('authors');
    }

    //Author módosítása
    public function edit(author $author)
    {
        return view('author.edit', [
            'author' => $author
        ]);
    }

    //Author módosításának tárolása
    public function update(UpdateauthorRequest $request, $id)
    {
        $author = author::find($id);
        $author->name = $request->name;
        $author->save();

        return redirect()->route('authors');
    }

    //Author törlése
    public function destroy($id)
    {
        author::findorfail($id)->delete();
        return redirect()->route('authors');
    }
}
