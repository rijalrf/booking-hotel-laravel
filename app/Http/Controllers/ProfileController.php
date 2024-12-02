<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Display the profile page
    public function index()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->with('picture')->first();
        // Return the view with the user's profile data
        return view('pages.profile.index', compact('employee'));
    }
}
