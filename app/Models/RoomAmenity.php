<?php

namespace App\Models;

use App\Models\Amenity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomAmenity extends Model
{
    /** @use HasFactory<\Database\Factories\RoomAmenityFactory> */
    use HasFactory;

    protected $guarded = [];

    public function Amenities()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id');
    }
}
