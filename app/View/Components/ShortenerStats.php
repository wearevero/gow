<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShortenerStats extends Component
{
    public function __construct(public $data, public string $name)
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.shortener-stats', [
            'data' => $this->data,
            'name' => $this->name,
        ]);
    }
}
