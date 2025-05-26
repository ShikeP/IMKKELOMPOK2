<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $activeCategory = $request->get('category', 'Meals');
        $category = Category::where('type', $activeCategory)->first();
        $foods = $category ? Food::where('category_id', $category->id)->get() : collect();
        return view('menu', compact('categories', 'foods', 'activeCategory'));
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);
        $recommendedSides = Food::whereHas('category', function($q){ $q->where('type', 'Sides'); })->get();
        $reviews = Review::where('food_id', $food->id)->with('user')->latest()->get();
        return view('menu_description', compact('food', 'recommendedSides', 'reviews'));
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);
        Review::create([
            'food_id' => $id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'review' => $request->review,
        ]);
        return redirect()->route('menu.show', $id)->with('success', 'Review submitted!');
    }
}
