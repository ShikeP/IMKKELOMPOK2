<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user->update($request->only('name', 'email', 'role'));
        return redirect()->route('admin.users.index')->with('success', 'User diperbarui!');
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User dihapus!');
    }
} 