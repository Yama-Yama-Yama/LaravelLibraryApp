@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Update Customer</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('customer.update', $customer->id) }}" method="post"
                        autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" placeholder="Customer Name" name="name"
                                value="{{ $customer->name }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="address"
                                value="{{ $customer->address }}" required>
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="birth_date"
                                value="{{ $customer->birth_date }}" required>
                            @error('birth_date')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                @if ($customer->gender == 'male')
                                    <option value="male" selected>Male</option>
                                @else
                                    <option value="female" selected>Female</option>
                                @endif
                            </select>
                            @error('gender')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="phone" class="form-control" placeholder="Phone" name="phone"
                                value="{{ $customer->phone }}" required>
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                value="{{ $customer->email }}" required>
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
