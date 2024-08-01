<?php

namespace App\View\Components;

use App\Models\Currency;
use Illuminate\View\Component;
use Illuminate\View\View;

class PublicLayout extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('layouts.public', [
            'currencies' => Currency::orderBy('id', 'asc')->get(),
        ]);
    }
}