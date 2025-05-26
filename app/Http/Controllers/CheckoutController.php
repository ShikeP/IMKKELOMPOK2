<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('checkout', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $useProfile = $request->has('use_profile');
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);
        if ($useProfile) {
            $data['name'] = $user->name;
            $data['address'] = $user->address;
            $data['phone'] = $user->phone;
        }
        $data['user_id'] = $user->id;
        $data['use_profile'] = $useProfile;
        $data['status'] = 'pending';
        $checkout = Checkout::create($data);
        session(['checkout_id' => $checkout->id]);
        return redirect()->route('order.summary');
    }

    public function success()
    {
        return view('checkout_success');
    }
}
