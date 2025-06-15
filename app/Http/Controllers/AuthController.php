<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            Log::info('User logged in successfully', ['user_id' => $user->id, 'email' => $user->email]);
            
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->intended('/home');
        }
        
        Log::warning('Failed login attempt', ['email' => $request->email]);
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set default role
        ]);

        Auth::login($user);
        Log::info('New user registered', ['user_id' => $user->id, 'email' => $user->email]);
        
        return redirect('/home');
    }
}
