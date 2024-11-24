<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //view index
    public function index()
    {
        return view('pages.home.index');
    }
}
