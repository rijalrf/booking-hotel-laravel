<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //view index
    public function index()
    {
        // get booking status = checked_in
        $checkedInBookings = Booking::where('status', 'checked_in')->paginate(5);

        // get booking status = checked_out
        $checkedOutBookings = Booking::where('status', 'checked_out')->paginate(5);

        // return view with data
        return view('pages.home.index', compact('checkedInBookings', 'checkedOutBookings'));
    }
}
