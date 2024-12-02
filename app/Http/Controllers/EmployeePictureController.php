<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmployeePicture;
use Illuminate\Support\Facades\Storage;

class EmployeePictureController extends Controller
{
    // add picture
    public function store(Request $request, $id)
    {
        // Validasi request
        $validated = $request->validate([
            'picture_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses upload file
        $fileName = Str::uuid() . '.' . $request->file('picture_url')->extension();
        $request->file('picture_url')->move(public_path('employee_pictures'), $fileName);

        // Simpan atau perbarui data gambar di database
        EmployeePicture::updateOrCreate(
            ['employee_id' => $id], // Kondisi
            ['picture_url' => $fileName] // Data yang diupdate/dibuat
        );

        // Redirect kembali dengan notifikasi sukses
        return redirect()->back()->with('notification', [
            'type' => 'success',
            'message' => 'Picture uploaded successfully.',
        ]);
    }
}
