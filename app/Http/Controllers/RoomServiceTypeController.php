<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomServiceType;

class RoomServiceTypeController extends Controller
{
    public function index()
    {
        // Fetch all room service types
        $roomServiceTypes = RoomServiceType::paginate(5);

        // Return the view with the room service types
        return view('pages.roomServiceType.index', compact('roomServiceTypes'));
    }

    //add action create
    public function create(Request $request)
    {

        //validate request
        $roomServiceType = $request->validate([
            'name' => 'required'
        ]);

        //save data
        RoomServiceType::create($roomServiceType);

        //redirect to index
        return redirect()->route('roomServiceType.index')->with('notification', [
            'type' => 'success',
            'message' => 'Room Service Type created successfully'
        ]);
    }
}
