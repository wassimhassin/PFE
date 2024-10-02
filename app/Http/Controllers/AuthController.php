<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('login')->with('success', 'login successful.'); 
        }

        return back()->withErrors(['email' => 'Invalid login credentials.']);
    }

    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'cin_number' => 'required|string|max:50',  
            'phone_number' => 'required|string|max:20', 
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin_number' => $request->cin_number,
            'phone_number' => $request->phone_number,   
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    // Logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}