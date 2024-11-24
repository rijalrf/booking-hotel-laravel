<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // view index
    public function index()
    {
        return view('pages.booking.index');
    }
}
