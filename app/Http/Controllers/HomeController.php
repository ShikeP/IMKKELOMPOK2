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
        $allFoods = Food::all();
        $specialOffer = Offer::latest()->first();

        return view('home', compact('user', 'allFoods', 'specialOffer'));
    }
}
