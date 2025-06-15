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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_type' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'note' => 'nullable',
            'payment_method' => 'required',
        ]);
        $user = Auth::user();
        // Ambil cart user
        $cartItems = Cart::where('user_id', $user->id)->with('food')->get();
        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Cart kosong'], 400);
        }
        // Simpan ke tabel Checkout (atau Order jika ada)
        $checkout = Checkout::create([
            'user_id' => $user->id,
            'order_type' => $validated['order_type'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'note' => $validated['note'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);
        // Simpan item cart ke tabel relasi (misal checkout_items)
        foreach ($cartItems as $item) {
            $checkout->items()->create([
                'food_id' => $item->food_id,
                'quantity' => $item->quantity,
                'price' => $item->food->price,
            ]);
        }
        // Kosongkan cart user
        Cart::where('user_id', $user->id)->delete();
        return response()->json(['success' => true, 'order_id' => $checkout->id]);
    }
}
