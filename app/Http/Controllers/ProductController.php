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

    public function show(Product $product) : View
    {
        return view('products.show', ['product' => $product]);
    }

    public function create() : View
    {
        return view('products.create');
    }

    public function edit(Product $product) : View
    {
        return view('products.edit', ['product' => $product]);
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    public function update(ProductRequest $request, Product $product) : RedirectResponse
    {
        $validatedRequest = $request->validated();

        $product->update($validatedRequest->all());
        return redirect()->route('products.show', $product)->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
    }
}
