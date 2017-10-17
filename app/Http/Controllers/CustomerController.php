<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }


    public function index()
    {
        $this->customer = Customer::all();
        return view('customers.index')->withCustomers($this->customer);
    }


    public function create()
    {
        return view('customers.create');
        return redirect()->route('customers.index');
    }


    public function store(Request $request)
    {
        Customer::create($request->all());
    }


    public function show(Customer $customer)
    {
        return view('customers.show')->withCustomer($customer);
    }


    public function edit(Customer $customer)
    {
        return view('customers.edit')->withCustomer($customer);
    }


    public function update(Request $request, Customer $customer)
    {
        $customer->fill($request->all())->save();
        return redirect()->route('customers.index');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
