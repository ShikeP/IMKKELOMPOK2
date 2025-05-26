<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        $meals = Food::whereHas('category', function($q){ $q->where('type', 'Meals'); })->get();
        $sides = Food::whereHas('category', function($q){ $q->where('type', 'Sides'); })->get();
        $snacks = Food::whereHas('category', function($q){ $q->where('type', 'Snacks'); })->get();
        $drinks = Food::whereHas('category', function($q){ $q->where('type', 'Drinks'); })->get();
        $specialOffer = Offer::latest()->first();
        $popularFoods = Food::where('is_popular', true)->get();
        return view('home', compact('user', 'categories', 'meals', 'sides', 'snacks', 'drinks', 'specialOffer', 'popularFoods'));
    }
}
