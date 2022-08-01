<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class Input extends Component
{

    public string $name;
    public string $label;
    public string $type;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        string $value = '',
        string $type = 'text',
    ) {
        $this->name       = $name;
        $this->label      = $label;
        $this->type       = $type;
        $this->value       = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.input');
    }
}
