@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">All Customers</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('customer.create') }}">Add Customer</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date of birth</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                                <tr>
                                    <td class="id">{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td class="text-capitalize">{{ $customer->gender }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->birth_date }}</td>
                                    <td class="edit">
                                        <a href="{{ route('customer.edit', $customer) }}>" class="btn btn-success">Edit</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('customer.destroy', $customer->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-customer">Delete</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Customers Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $customers->links('vendor/pagination/bootstrap-4') }}
                    
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    
@endsection
