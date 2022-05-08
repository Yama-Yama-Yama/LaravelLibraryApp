<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Settings;
use App\Models\Customer;
use App\Models\BookIssue;
use App\Http\Requests\StorebookissueRequest;
use Carbon\Carbon;

class BookIssueController extends Controller
{
    //Kiadások listázása
    public function index()
    {
        return view('book.issueIndex', [
            'books' => BookIssue::Paginate(5)
        ]);
    }

    //Kiadás ablak
    public function create()
    {
        return view('book.issueAdd', [
            'customers' => customer::latest()->get(),
            'books' => book::where('status', '0')->get(),
        ]);
    }

    //Kiadás felvétele
    public function store(StorebookissueRequest $request)
    {
        $issue_date = date('Y-m-d');
        $number = 14;
        $return_date = date('Y-m-d', strtotime("+" . ($number) . " days"));
        $data = BookIssue::create($request->validated() + [
            'customer_id' => $request->customer_id,
            'book_id' => $request->book_id,
            'issue_date' => $issue_date,
            'return_day' => $return_date,
            'issue_status' => '1',
        ]);
        $data->save();
        $book = book::find($request->book_id);
        $book->status = '0';
        $book->save();
        return redirect()->route('book_issued');
    }

    //Kiadás módosítás ablak
    public function edit($id)
    {
        // calculate the total fine  (total days * fine per day)
        $book = BookIssue::where('id',$id)->get()->first();
        $first_date = date_create(date('Y-m-d'));
        $last_date = date_create($book->return_date);
        $diff = date_diff($first_date, $last_date);
        $fine = (settings::latest()->first()->fine * $diff->format('%a'));
        return view('book.issueEdit', [
            'book' => $book,
            'fine' => $fine,
        ]);
    }

    //Kiadás módsítás mentése
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $book = BookIssue::find($id);
        $book->issue_status = '1';
        $book->return_day = now();
        $book->save();
        $bookk = book::find($book->book_id);
        $bookk->status= '1';
        $bookk->save();
        return redirect()->route('book_issued');
    }

    //Delete
    public function destroy($id)
    {
        BookIssue::find($id)->delete();
        return redirect()->route('book_issued');
    }
}

