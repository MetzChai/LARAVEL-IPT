<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|numeric|min:0.01|max:999999.99',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Product name is required.',
            'name.min' => 'Product name must be at least 3 characters.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price must be greater than 0.',
            'price.max' => 'Price cannot exceed 999,999.99.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
        ]);
        
        Product::create($validated);
        return redirect()->route('products.index')
                        ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|numeric|min:0.01|max:999999.99',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Product name is required.',
            'name.min' => 'Product name must be at least 3 characters.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price must be greater than 0.',
            'price.max' => 'Price cannot exceed 999,999.99.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category is invalid.',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')
                        ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                        ->with('success', 'Product deleted successfully.');
    }
}
