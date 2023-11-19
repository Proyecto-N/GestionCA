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

    public function create() : View
    {
        return view('sales.create');
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        Sale::create($request->validated());
        return redirect()->route('sales.index')->with('success', 'Venta registrada correctamente');
    }
}
