<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //Könyvek megjelenítése
    public function index()
    {

        return view('book.index', [
            'books' => book::Paginate(5)
        ]);
    }

    //Könyv hozzáadása
    public function create()
    {
        return view('book.create',[
            'authors' => author::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
        ]);
    }

    //Könyv tárolása
    public function store(StorebookRequest $request)
    {
        book::create($request->validated() + [
            'status' => 'Y'
        ]);
        return redirect()->route('books');
    }

    //Könyv editelése
    public function edit(book $book)
    {
        return view('book.edit',[
            'authors' => author::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
            'book' => $book
        ]);
    }

    //Könyv update
    public function update(UpdatebookRequest $request, $id)
    {
        $book = book::find($id);
        $book->name = $request->name;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->save();
        return redirect()->route('books');
    }

    //Könyv törlése
    public function destroy($id)
    {
        book::find($id)->delete();
        return redirect()->route('books');
    }
}
