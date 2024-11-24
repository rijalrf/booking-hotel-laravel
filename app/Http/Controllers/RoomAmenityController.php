<?php

namespace App\Http\Controllers;

use App\Models\RoomAmenity;
use Illuminate\Http\Request;

class RoomAmenityController extends Controller
{
    // create room amenity
    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'room_id' => 'required|integer',
            'amenity_id' => 'required|integer',
        ]);

        // Create room amenity
        $roomAmenity = RoomAmenity::create($request->all());

        return redirect()->back()->with('notification', [
            'type' => 'success',
            'message' => 'Amenity has been added to the room successfully.'
        ]);
    }

    // delete room amenity
    public function delete($id)
    {
        // Delete room amenity
        RoomAmenity::destroy($id);

        return redirect()->back()->with('notification', [
            'type' => 'success',
            'message' => 'Amenity has been removed from the room successfully.'
        ]);
    }
}
