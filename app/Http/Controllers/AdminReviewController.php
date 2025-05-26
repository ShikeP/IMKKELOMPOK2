<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index() {
        $reviews = Review::with('food','user')->latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }
    public function destroy($id) {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted!');
    }
} 