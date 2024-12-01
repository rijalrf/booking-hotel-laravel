<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Display the profile page
    public function index($user)
    {

        // Return the view with the user's profile data
        return view('pages.profile.index', compact('user'));
    }
}
