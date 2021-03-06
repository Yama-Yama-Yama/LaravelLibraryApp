@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">All Book Issues</h2>
                </div>
                <div class="offset-md-6 col-md-3">
                    <a class="add-new" href="{{ route('book_issue.create') }}">Add Book Issue</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="content-table">
                        <thead>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Book Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Returned</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr style='@if (date('Y-m-d') > $book->return_day->format('d-m-Y') && $book->issue_status == '0') ) background:rgba(255,0,0,0.2) @endif'>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->customer->name }}</td>
                                    <td>{{ $book->book->name }}</td>
                                    <td>{{ $book->customer->phone }}</td>
                                    <td>{{ $book->customer->email }}</td>
                                    <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                    <td>{{ $book->return_day->format('d M, Y') }}</td>
                                    <td>
                                        @if ($book->issue_status == '0')
                                            <span class='badge badge-success'>Returned</span>
                                        @else
                                            <span class='badge badge-danger'>Issued</span>
                                        @endif
                                    </td>
                                    <td class="update">
                                        
                                        <form action="{{ route('book_issue.update', $book->id) }}" method="post" autocomplete="off">
                                            @csrf
                                            <input type='submit' class='btn btn-success' name='save' value='Return Book'>
                                        </form>
                                    </td>
                                    <td class="delete">
                                        @if ($book->issue_status == '0')
                                        <form action="{{ route('book_issue.destroy', $book) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger">Delete</button>
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">No Books Issued</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
