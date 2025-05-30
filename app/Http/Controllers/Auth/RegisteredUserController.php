<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Employers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->role === 'applicant') {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:applicants,email',
                'password' => 'required|confirmed|min:8',
                'gender' => 'required|string',
                'birthday' => 'required|date',
                'age' => 'required|integer',
                'address' => 'required|string',
                'phone' => 'required|string',
            ]);

            Applicant::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'age' => $request->age,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
        } elseif ($request->role === 'employer') {
            $request->validate([
                'employer_name' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'company_password' => 'required|confirmed|min:8',
                'company_email' => 'required|email|unique:employers,company_email',
                'location' => 'required|string',
            ]);

            Employers::create([
                'employer_name' => $request->name,
                'company_name' => $request->company_name,
                'employer_password' => Hash::make($request->password),
                'company_email' => $request->company_email,
                'location' => $request->location,
            ]);
        } else {
            return back()->withErrors(['role' => 'Please select a valid role.']);
        }

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}