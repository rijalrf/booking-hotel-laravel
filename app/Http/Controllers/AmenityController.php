<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    // index page
    public function index()
    {
        // fetch all amenities
        $amenities = Amenity::latest()->paginate(5);

        // return view with amenities
        return view('pages.amenity.index', compact('amenities'));
    }

    public function create(Request $request)
    {
        // validate request
        $amenity = $request->validate([
            'name' => 'required'
        ]);

        // save data
        Amenity::create($amenity);

        // redirect to amenity index page
        return redirect()->route('amenity.index')->with('notification', [
            'type' => 'success',
            'message' => 'Amenity created successfully'
        ]);
    }

    public function edit(Request $request, $id)
    {
        // find amenity by id
        $amenity = Amenity::find($id);

        // validate request
        $amenity->update($request->validate([
            'name' => 'required'
        ]));

        // redirect to amenity index page
        return redirect()->route('amenity.index')->with('notification', [
            'type' => 'success',
            'message' => 'Amenity updated successfully'
        ]);
    }

    public function delete($id)
    {
        // find amenity by id
        $amenity = Amenity::find($id);

        // delete amenity
        $amenity->delete();

        // redirect to amenity index page
        return redirect()->route('amenity.index')->with('notification', [
            'type' => 'success',
            'message' => 'Amenity deleted successfully'
        ]);
    }
}
