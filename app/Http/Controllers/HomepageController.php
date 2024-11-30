<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RoomServiceType;

class HomepageController extends Controller
{


    //view index
    public function index()
    {
        // get booking status = checked_in
        $checkedInBookings = Booking::where('status', 'booked')->paginate(5, ['*'], 'checked_in_page');

        // get booking status = checked_out
        $checkedOutBookings = Booking::where('status', 'checked_in')->paginate(5, ['*'], 'checked_out_page');

        //get room service type
        $roomServices = RoomServiceType::latest()->get();

       
        // return view with data
        return view('pages.home.index', compact('checkedInBookings', 'checkedOutBookings', 'roomServices'));
    }
}
