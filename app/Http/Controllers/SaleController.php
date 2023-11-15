<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\SaleRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', ['sales' => $sales]);
    }

    public function create()
    {
        return view('sales.register');
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        Sale::create($request->validated());
        return redirect()->route('sales.index')->with('success', 'Venta registrada correctamente');
    }
}
