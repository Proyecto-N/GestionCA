<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index() : View
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    public function show(Customer $customer) : View
    {
        return view('customers.show', ['customer' => $customer]);
    }

    public function create() : View
    {
        return view('customers.create');
    }

    public function edit(Customer $customer) : View
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    public function store(CustomerRequest $request) : RedirectResponse
    {
        Customer::create($request->validated());
        return redirect()->route('customers.index')->with('success', 'Cliente creado correctamente');
    }

    public function update(CustomerRequest $request, Customer $customer) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $concept->update($validatedRequest->all());
        return redirect()->route('customers.show', $concept)->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Customer $customer) : RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Cliente eliminado exitosamente');
    }
}
