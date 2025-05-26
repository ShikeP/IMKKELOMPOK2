<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function edit() {
        $user = Auth::user();
        return view('profile_edit', compact('user'));
    }

    public function update(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);
        $data = $request->only('name', 'email', 'phone', 'address');
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $data['photo'] = $path;
        }
        $user->update($data);
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
} 