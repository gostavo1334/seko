<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\ProcessImage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function index()
    {
        $products = Product::all();
        $processImages = ProcessImage::all();

        return view('dashboard.dashboard', compact('products', 'processImages'));
    }
// DashboardController.php
 public function create()
    {
         Product::create();
        return redirect()->route('dashboard.dashboard')->with('success', 'Product added successfully!');
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredients' => 'nullable|string',
        'usage_instructions' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $productData = [
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'ingredients' => $validatedData['ingredients'],
        'usage_instructions' => $validatedData['usage_instructions'],
        'price' => $validatedData['price'],
    ];

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $productData['image'] = $imagePath;
    }

    Product::create($productData);

    return redirect()->route('dashboard')->with('success', 'Product added successfully!');
}
    public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('dashboard')->with('success', 'Product deleted successfully!');
}
public function edit(Product $product)
{
    return view('dashboard.edit', compact('product'));
}
public function update(Request $request, Product $product)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'ingredients' => 'nullable|string',
        'usage_instructions' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $productData = [
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'ingredients' => $validatedData['ingredients'],
        'usage_instructions' => $validatedData['usage_instructions'],
        'price' => $validatedData['price'],
    ];

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $imagePath = $request->file('image')->store('products', 'public');
        $productData['image'] = $imagePath;
    }

    $product->update($productData);

    return redirect()->route('dashboard')->with('success', 'Product updated successfully!');
}


}


