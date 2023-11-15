<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.register');
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }
}
