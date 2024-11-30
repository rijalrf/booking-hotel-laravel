<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    /** @use HasFactory<\Database\Factories\RoomServiceFactory> */
    use HasFactory;
    protected $fillable = ['room_service_type_id', 'booking_id', 'price'];
}
