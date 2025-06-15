<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Review;

class AdminProductController extends Controller
{
    public function index() {
        $products = Food::with('category')->get();
        return view('admin.products.index', compact('products'));
    }
    public function create() {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = $request->except(['_token']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Food::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product added!');
    }
    public function edit($id) {
        $product = Food::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $product = Food::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated!');
    }
    public function destroy($id) {
        $product = Food::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted!');
    }
    public function deleteReview($id) {
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with('success', 'Review deleted!');
    }
} 