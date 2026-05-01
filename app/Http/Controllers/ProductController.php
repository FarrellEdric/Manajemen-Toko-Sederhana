<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:products',
            'price' => 'required',
            'stock' => 'required',
        ]);

        product::create([
            'name' => $request->name,
            'code' => $request->code,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}