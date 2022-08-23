<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class Card extends Component
{
    public $footer;
    public $customTools;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($footer = '')
    {
        $this->footer = $footer;
        $this->customTools = '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.card');
    }
}
