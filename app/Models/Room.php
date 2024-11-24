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
}
