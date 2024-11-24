<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomAmenity;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        //fetch data room
        $rooms = Room::latest()->paginate(10);

        //return view with data
        return view('pages.room.index', compact('rooms'));
    }

    public function add()
    {
        //return view to add room
        return view('pages.room.add');
    }

    public function detail($id)
    {
        //fetch data amenity
        $amenities = Amenity::all();

        // find room by id
        $roomamenities = RoomAmenity::where('room_id', $id)->with('Amenities')->get();

        // find room by id
        $room = Room::find($id);

        // return view to edit room
        return view('pages.room.edit', compact('roomamenities', 'amenities', 'room'));
    }

    public function create(Request $request)
    {
        //validate request
        $room = $request->validate([
            'roomNumber' => 'required',
            'childrenCapacity' => 'required',
            'adultCapacity' => 'required',
            'price' => 'required'
        ]);

        //store data to room table
        Room::create($room);

        //redirect to room index page
        return redirect()->route('room.index')->with('notification', [
            'type' => 'success',
            'message' => 'Room has been added successfully!'
        ]);
    }

    // add function delete
    public function delete($id)
    {
        // find room by id
        $room = Room::find($id);

        // delete room
        $room->delete();

        // redirect to room index page
        return redirect()->route('room.index')->with('notification', [
            'type' => 'success',
            'message' => 'Room has been deleted successfully!'
        ]);
    }
}
