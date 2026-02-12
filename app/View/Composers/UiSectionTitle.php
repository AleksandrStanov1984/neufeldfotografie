<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UiSectionTitle extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $subtitle = null,
    ) {}

    public function render()
    {
        return view('components.ui-section-title');
    }
}
