<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    protected $fillable = [
        'guest_lastname',
        'guest_firstname',
        'check_in_date',
        'check_out_date',
        'adult_capacity',
        'children_capacity',
        'room_id',
        'status',
        'created_by',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
