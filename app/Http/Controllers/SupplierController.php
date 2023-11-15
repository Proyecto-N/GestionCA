<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    public function create()
    {
        return view('suppliers.register');
    }

    public function store(SupplierRequest $request) : RedirectResponse
    {
        Supplier::create($request->validated());
        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado correctamente');
    }
}
