<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
            'company' => 'required_if:role,employer|string|max:255',
            'company_email' => 'required_if:role,employer|string|email|max:255|unique:employers',
            'location' => 'required_if:role,employer|string|max:255',
        ]);

        // Create the user
        $user = Employers::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // If the role is employer, create an employer record
        if ($request->role === 'employer') {
            Employers::create([
                'user_id' => $user->id,
                'company' => $request->company,
                'company_email' => $request->company_email,
                'location' => $request->location,
            ]);
        }

        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials',
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

}