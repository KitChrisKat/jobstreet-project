<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Example: Filter by role
    public function employers()
    {
        $employers = User::where('role', 'employer')->get();
        return view('users.employers', compact('employers'));
    }
}
