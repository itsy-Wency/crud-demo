<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of products with optional global search
    public function index(Request $request)
    {
        $query = $request->input('query'); // get search input

        // Filter products if search query is provided
        $products = Product::query()
            ->when($query, function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('price', 'like', "%{$query}%")
                  ->orWhere('quantity', 'like', "%{$query}%");
            })
            ->get();

        return view('products.index', compact('products', 'query'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        Product::create($request->only('name', 'price', 'quantity')); // safer mass assignment

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product->update($request->only('name', 'price', 'quantity')); // safer mass assignment

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    // Remove the specified product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
