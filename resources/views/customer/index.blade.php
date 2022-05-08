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
                            <th>View</th>
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
                                    <td class="view">
                                        <button data-sid='{{ $customer->id }}>'
                                            class="btn btn-primary view-btn">View</button>
                                    </td>
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
                    <div id="modal">
                        <div id="modal-form">
                            <table cellpadding="10px" width="100%">

                            </table>
                            <div id="close-btn">X</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        //Show shudent detail
        $(".view-btn").on("click", function() {
            var customer_id = $(this).data("sid");
            $.ajax({
                url: "http://127.0.0.1:8000/customer/show/"+customer_id,
                type: "get",
                success: function(customer) {
                    console.log(customer);
                    form ="<tr><td>Customer Name :</td><td><b>"+customer['name']+"</b></td></tr><tr><td>Address :</td><td><b>"+customer['address']+"</b></td></tr><tr><td>Gender :</td><td><b>"+ customer['gender']+ "</b></td></tr><tr><td>Class :</td><td><b>"+ customer['class']+ "</b></td></tr><tr><td>Age :</td><td><b>"+ customer['age']+ "</b></td></tr><tr><td>Phone :</td><td><b>"+ customer['phone']+ "</b></td></tr><tr><td>Email :</td><td><b>"+ customer['email']+ "</b></td></tr>";
          console.log(form);

                    $("#modal-form table").html(form);
                    $("#modal").show();
                }
            });
        });

        //Hide modal box
        $('#close-btn').on("click", function() {
            $("#modal").hide();
        });

        //delete customer script
        $(".delete-customer").on("click", function() {
            var s_id = $(this).data("sid");
            $.ajax({
                url: "delete-customer.php",
                type: "POST",
                data: {
                    sid: s_id
                },
                success: function(data) {
                    $(".message").html(data);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });
    </script>
@endsection
