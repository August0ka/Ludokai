<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BeautifulAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $multipleChoices = false,
        public string $confirmText = 'Sim',
        public string $declineText = 'Não',
        public string $type = 'success',
        public string $message = '',
        public string $title = ''
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.beautiful-alert');
    }
}
