<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.employer-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|unique:employers,company_email',
            'password' => 'required|confirmed|min:8',
            'industry' => 'nullable|string|max:255',
            'company_address' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        Employers::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'password' => Hash::make($request->password),
            'industry' => $request->industry,
            'company_address' => $request->company_address,
            'location' => $request->location,
        ]);

        return redirect()->route('employer.login')->with('success', 'Registration successful!');
    }
}
