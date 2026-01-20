<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Detail extends Component
{
    public string $label;
    public string $value;

    public function __construct(string $label = '-', string $value = '-')
    {
        $this->label = $label;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.detail');
    }
}
