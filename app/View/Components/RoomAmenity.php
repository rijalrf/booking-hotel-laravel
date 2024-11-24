<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoomAmenity extends Component
{
    public $amenityList;
    public $roomamenities;
    public $roomId;
    /**
     * Create a new component instance.
     */
    public function __construct($roomamenities, $amenityList, $roomId)
    {
        //
        $this->amenityList = $amenityList;
        $this->roomamenities = $roomamenities;
        $this->roomId = $roomId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-amenity');
    }
}
