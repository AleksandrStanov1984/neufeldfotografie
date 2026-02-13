<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UiSectionTitle extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $subtitle = null,
        public ?string $tKey = null,
        public string $tag = 'h2',
        public ?string $id = null,
    ) {}

    public function resolvedTitle(): ?string
    {
        if ($this->tKey) {
            return __($this->tKey . '.title');
        }

        return $this->title;
    }

    public function resolvedSubtitle(): ?string
    {
        if ($this->tKey) {
            return __($this->tKey . '.subtitle');
        }

        return $this->subtitle;
    }

    public function render()
    {
        return view('components.ui-section-title');
    }
}
