<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(Request $request, $categoryName = null)
    {
        $categories = Category::all();
        $activeCategory = $categoryName ?? 'Makanan';

        $category = Category::where('name', $activeCategory)->first();

        // Jika kategori tidak ditemukan, default ke 'Makanan' untuk mencegah error
        if (!$category) {
            $activeCategory = 'Makanan';
            $category = Category::where('name', 'Makanan')->first();
        }

        $foods = $category ? Food::where('category_id', $category->id)->get() : collect();
        return view('menu', compact('categories', 'foods', 'activeCategory'));
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);
        
        // Ambil kategori 'Lauk'
        $laukCategory = Category::where('name', 'Lauk')->first();

        $recommendedLauk = collect();
        if ($laukCategory) {
            $recommendedLauk = Food::where('category_id', $laukCategory->id)
                                ->where('id', '!=', $food->id)
                                ->take(6) // Ambil maksimal 6 lauk rekomendasi
                                ->get();
        }

        $reviews = Review::where('food_id', $food->id)->with('user')->latest()->get();

        return view('menu_description', compact('food', 'recommendedLauk', 'reviews'));
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
