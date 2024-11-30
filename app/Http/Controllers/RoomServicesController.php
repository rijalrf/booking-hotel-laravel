<?php

namespace App\Http\Controllers;

use App\Models\RoomService;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class RoomServicesController extends Controller
{
    //action create
    public function create(Request $request)
    {
        //validate the request
        $request->validate([
            'room_service_type_id' => 'required|integer',
            'booking_id' => 'required|integer',
            'price' => 'required|integer',
        ]);

        //create new record
        $roomService = RoomService::create($request->all());

        //return response
        return redirect()->back()->with('notification', [
            'type' => 'success',
            'message' => 'Room service requested successfully',

        ]);
    }
}
