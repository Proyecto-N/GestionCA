<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create() : View
    {
        return view('products.create');
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }
}
