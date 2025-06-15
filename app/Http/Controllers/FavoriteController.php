<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFavorite;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request, Food $food)
    {
        if (Auth::check()) {
            UserFavorite::firstOrCreate([
                'user_id' => Auth::id(),
                'food_id' => $food->id,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Produk ditambahkan ke favorit!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Silakan login untuk menambahkan favorit.'], 401);
    }

    public function removeFavorite(Request $request, Food $food)
    {
        if (Auth::check()) {
            UserFavorite::where('user_id', Auth::id())
                        ->where('food_id', $food->id)
                        ->delete();
            return response()->json(['status' => 'success', 'message' => 'Produk dihapus dari favorit!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Silakan login untuk menghapus favorit.'], 401);
    }

    public function index()
    {
        if (Auth::check()) {
            $favoriteItems = UserFavorite::where('user_id', Auth::id())->with('food')->get();
            return view('favorites', compact('favoriteItems'));
        }
        return redirect()->route('login');
    }

    public function checkFavoriteStatus(Request $request, Food $food)
    {
        if (Auth::check()) {
            $isFavorited = UserFavorite::where('user_id', Auth::id())
                                    ->where('food_id', $food->id)
                                    ->exists();
            return response()->json(['is_favorited' => $isFavorited]);
        }
        return response()->json(['is_favorited' => false]);
    }
}
