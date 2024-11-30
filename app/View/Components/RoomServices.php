<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoomServices extends Component
{
    public $roomServices;
    public $bookingSelected;

    public function __construct($roomServices, $bookingSelected)
    {
        $this->roomServices = $roomServices;
        $this->bookingSelected = $bookingSelected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-services');
    }
}
