<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\User;
use App\Models\Food;

class AdminOrderController extends Controller
{
    public function index() {
        $orders = Checkout::with(['user', 'product'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function updateStatus(Request $request, $id) {
        $order = Checkout::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan diperbarui!');
    }
    public function destroy($id) {
        $order = Checkout::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Pesanan dihapus!');
    }
} 