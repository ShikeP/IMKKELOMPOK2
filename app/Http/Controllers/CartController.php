<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cartItems = Cart::with('food')->where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item) {
            return $item->food->price * $item->quantity;
        });
        return view('cart', compact('cartItems', 'total'));
    }

    public function add(Request $request, $food_id) {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
            'food_id' => $food_id
        ]);
        $cart->quantity += $request->input('quantity', 1);
        $cart->save();
        return redirect()->route('cart.index')->with('success', 'Ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id) {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->quantity = $request->input('quantity', 1);
        $cart->save();
        return back()->with('success', 'Keranjang diperbarui!');
    }

    public function destroy($id) {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();
        return back()->with('success', 'Item dihapus dari keranjang!');
    }
} 