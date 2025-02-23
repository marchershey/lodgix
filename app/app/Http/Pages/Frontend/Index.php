<?php

namespace App\Http\Pages\Frontend;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.base', ['title' => 'Welcome'])]
class Index extends Component
{
    public $properties;

    public function render()
    {
        return view('pages.frontend.index');
    }

    public function loadProperties(): void {}
}
