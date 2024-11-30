<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomServiceType;

class RoomServiceTypeController extends Controller
{
    public function index()
    {
        // Fetch all room service types
        $roomServiceTypes = RoomServiceType::latest()->paginate(5);

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

    //add action edit
    public function edit(Request $request, $id)
    {
        // find room service type by id
        $roomServiceType = RoomServiceType::find($id);

        // update data
        $roomServiceType->update($request->all());

        // redirect to index
        return redirect()->route('roomServiceType.index')->with('notification', [
            'type' => 'success',
            'message' => 'Room Service Type updated successfully'
        ]);
    }

    // add action delete
    public function delete($id)
    {
        // find room service type by id
        $roomServiceType = RoomServiceType::find($id);

        // delete data
        $roomServiceType->delete();

        // redirect to index
        return redirect()->route('roomServiceType.index')->with('notification', [
            'type' => 'success',
            'message' => 'Room Service Type deleted successfully'
        ]);
    }
}
