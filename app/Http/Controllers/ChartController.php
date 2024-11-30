<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart()
    {
        // Mengambil data 7 hari terakhir
        $startDate = Carbon::now()->subDays(6); // 7 hari termasuk hari ini
        $endDate = Carbon::now();

        // Inisialisasi data chart
        $dates = [];
        $data = [];

        // Looping untuk setiap hari selama 7 hari terakhir
        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            $formattedDate = $date->format('Y-m-d');
            $dates[] = $formattedDate;

            // Hitung jumlah kamar terpakai pada tanggal ini
            $data[] = Booking::whereDate('check_in_date', $formattedDate)->where(['status' => 'checked_in'])->count(); // Ganti `created_at` sesuai kolom tanggal booking di database Anda
        }

        // Kirim data ke view
        $chartData = [
            'labels' => $dates,
            'data' => $data,
        ];

        return response()->json($chartData);
    }
}
