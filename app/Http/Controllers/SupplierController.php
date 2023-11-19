<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index() : View
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    public function show(Supplier $supplier) : View
    {
        return view('suppliers.show', ['supplier' => $supplier]);
    }

    public function create() : View
    {
        return view('suppliers.create');
    }

    public function edit(Supplier $supplier) : View
    {
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function store(SupplierRequest $request) : RedirectResponse
    {
        Supplier::create($request->validated());
        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado correctamente');
    }

    public function update(SupplierRequest $request, Supplier $supplier) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $supplier->update($validatedRequest->all());
        return redirect()->route('suppliers.show', $supplier)->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy(Supplier $supplier) : RedirectResponse
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado exitosamente');
    }
}
