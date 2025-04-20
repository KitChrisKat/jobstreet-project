<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        $user = Auth::user();
        if ($user->resume) {
            Storage::delete('public/resumes/' . $user->resume);
        }

        $resumeName = time() . '_' . $request->resume->getClientOriginalName();
        $request->resume->storeAs('public/resumes', $resumeName);
        
        $user->resume = $resumeName;
        $user->save();

        return redirect()->back()->with('success', 'Resume uploaded successfully.');
    }
}
