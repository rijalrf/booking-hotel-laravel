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
        $request->validate([
            'picture_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'picture_url.required' => 'Please select an image to upload.',
            'picture_url.image' => 'The file must be an image.',
            'picture_url.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'picture_url.max' => 'The image size must not exceed 2MB.',
        ]);

        // Proses upload file
        $file = $request->file('picture_url');
        $extension = $file->getClientOriginalExtension();
        if (empty($extension)) {
            $extension = $file->extension();
        }
        
        $fileName = Str::uuid() . '.' . $extension;
        $file->move(public_path('employee_pictures'), $fileName);

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

    // delete picture
    public function destroy($id)
    {
        // Temukan data gambar berdasarkan employee_id
        $picture = EmployeePicture::where('employee_id', $id)->first();

        if ($picture) {
            // Hapus file dari penyimpanan public
            $filePath = public_path('employee_pictures/' . $picture->picture_url);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus record dari database
            $picture->delete();

            return redirect()->back()->with('notification', [
                'type' => 'success',
                'message' => 'Picture deleted successfully.',
            ]);
        }

        return redirect()->back()->with('notification', [
            'type' => 'danger',
            'message' => 'No picture found to delete.',
        ]);
    }
}
