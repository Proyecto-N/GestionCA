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

    public function create() : View
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request) : RedirectResponse
    {
        Customer::create($request->validated());
        return redirect()->route('customers.index')->with('success', 'Cliente creado correctamente');
    }
}
