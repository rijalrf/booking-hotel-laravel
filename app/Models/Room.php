<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function RoomAmenity()
    {
        return $this->hasMany(RoomAmenity::class, 'room_id');
    }
    public function Bookings()
    {
        return $this->hasMany(Booking::class, 'room_id');
    }
    public static function getAvailableRooms($checkIn, $checkOut, $adults, $children)
    {
        // Ambil kamar yang tersedia dengan harga termurah
        return self::where('adultCapacity', '>=', $adults)
            ->where('childrenCapacity', '>=', $children)
            ->whereDoesntHave('Bookings', function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($q) use ($checkIn, $checkOut) {
                    $q->whereBetween('check_in_date', [$checkIn, $checkOut])
                        ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                        ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                            $q2->where('check_in_date', '<=', $checkIn)
                                ->where('check_out_date', '>=', $checkOut);
                        });
                });
            })
            // Menambahkan kolom harga dan urutkan berdasarkan harga terendah
            ->orderBy('price', 'asc')  // Asumsikan ada kolom 'room_price' pada tabel rooms
            ->first(['id as room_id', 'roomNumber as room_number']);  // Ambil data yang diperlukan
    }
}
