<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class viewRole extends Component
{
    public $hasRole;
    public function __construct($hasRole)
    {
        $this->hasRole = $hasRole;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.view-role');
    }
}
