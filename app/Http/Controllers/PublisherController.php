<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    //Kiadók megjelenítése
    public function index()
    {
        return view('publisher.index', [
            'publishers' => publisher::Paginate(5)
        ]);
    }

    //Kiadó hozzáadása lap
    public function create()
    {
        return view('publisher.create');
    }

    //Új kiadó tárolása
    public function store(StorepublisherRequest $request)
    {
        publisher::create($request->validated());
        return redirect()->route('publishers');
    }

    //Kiadó módosítása lap
    public function edit(publisher $publisher)
    {
        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    //Kiadó módosításának mentése
    public function update(UpdatepublisherRequest $request, $id)
    {
        $publisher = publisher::find($id);
        $publisher->name = $request->name;
        $publisher->save();

        return redirect()->route('publishers');
    }

    //Kiadó törlése
    public function destroy($id)
    {
        publisher::find($id)->delete();
        return redirect()->route('publishers');
    }
}
