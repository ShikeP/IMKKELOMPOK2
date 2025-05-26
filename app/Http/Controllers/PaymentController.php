<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('payment', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:ovo,dana,cod',
            'phone' => 'required',
        ]);
        // Simpan info pembayaran ke session/DB jika perlu
        return redirect()->route('checkout.success');
    }
}
