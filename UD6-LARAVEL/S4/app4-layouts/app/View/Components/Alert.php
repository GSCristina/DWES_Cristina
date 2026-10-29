<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $tipo = 'info',
        public string $mensaje = '',
    ) {
    }

    public function render(): View
    {
        return view('components.alert');
    }
}
