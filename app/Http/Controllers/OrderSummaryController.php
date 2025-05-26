<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class OrderSummaryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $checkoutId = session('checkout_id');
        $checkout = Checkout::findOrFail($checkoutId);
        $cartItems = Cart::where('user_id', $user->id)->with('food')->get();
        $subtotal = $cartItems->sum(function($item) { return $item->food->price * $item->quantity; });
        $deliveryFee = 10000; // contoh ongkir
        $total = $subtotal + $deliveryFee;
        return view('order_summary', compact('checkout', 'cartItems', 'subtotal', 'deliveryFee', 'total'));
    }
}
