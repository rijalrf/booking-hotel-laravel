<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Amenity;
use App\Models\Booking;
use App\Models\RoomAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        if (Gate::denies('create-room')) {
            // abort(403, 'Anda tidak memiliki izin untuk akses create room.');
            return redirect()->route('room.index');
        }
        //return view to add room
        return view('pages.room.add');
    }

    public function show($id)
    {
        $room = Room::find($id);
        $roomAmenities = RoomAmenity::where('room_id', $id)->with('Amenities')->paginate(10);
        // dd($roomAmenities);

        return view('pages.room.show', compact('room', 'roomAmenities'));
    }

    public function detail($id)
    {
        if (Gate::denies('create-room')) {
            // abort(403, 'Anda tidak memiliki izin untuk akses create room.');
            return redirect()->route('room.index');
        }
        //fetch data amenity
        $amenities = Amenity::all();

        // find room by id
        $roomamenities = RoomAmenity::where('room_id', $id)->with('Amenities')->paginate(4);

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

    public function searchRoomBooking(Request $request)
    {

        $booking = Booking::whereHas('room', function ($query) use ($request) {
            $query->where('roomNumber', $request->room_number); // Filter berdasarkan roomNumber
        })
            ->where('status', 'checked_in')
            ->with('room')  // Memuat relasi room
            ->latest()
            ->first();

        return response()->json([
            'status' => 'success',
            'booking' => $booking,
        ]);
    }
}
