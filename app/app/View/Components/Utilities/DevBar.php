<?php

namespace App\View\Components\Utilities;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DevBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|View|string
    {
        return view('components.utilities.dev-bar');
    }
}
