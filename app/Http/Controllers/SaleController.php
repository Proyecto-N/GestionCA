<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\SaleRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SaleController extends Controller
{
    public function index() : View
    {
        $sales = Sale::all();
        return view('sales.index', ['sales' => $sales]);
    }

    public function show(Sale $sale) : View
    {
        return view('sales.show', ['sale' => $sale]);
    }

    public function create() : View
    {
        return view('sales.create');
    }

    public function edit(Sale $sale) : View
    {
        return view('sales.edit', ['sale' => $sale]);
    }

    public function store(SaleRequest $request) : RedirectResponse
    {
        Sale::create($request->validated());
        return redirect()->route('sales.index')->with('success', 'Venta registrada correctamente');
    }

    public function update(SaleRequest $request, Sale $sale) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $sale->update($validatedRequest->all());
        return redirect()->route('sales.show', $sale)->with('success', 'Venta actualizada correctamente');
    }

    public function destroy(Sale $sale) : RedirectResponse
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Venta eliminada exitosamente');
    }
}
