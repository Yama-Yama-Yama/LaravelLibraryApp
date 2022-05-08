<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    //Customer megjelenítése
    public function index()
    {
        return view('customer.index', [
            'customers' => customer::Paginate(5)
        ]);
    }

    //Új customer lap
    public function create()
    {
        return view('customer.create');
    }

    //Új customer tárolása
    public function store(StorecustomerRequest $request)
    {
        customer::create($request->validated());

        return redirect()->route('customers');
    }

    //
    public function show($id)
    {
        $customer = customer::find($id)->first();
        return $customer;
    }

    //Customer edit
    public function edit(customer $customer)
    {
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    //Update
    public function update(UpdatecustomerRequest $request, $id)
    {
        $customer = customer::find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        $customer->class = $request->class;
        $customer->age = $request->age;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->route('customers');
    }

    //Delete
    public function destroy($id)
    {
        customer::find($id)->delete();
        return redirect()->route('customers');
    }
}
