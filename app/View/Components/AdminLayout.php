<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public $footerScripts;
    public $pageTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($footerScripts = '', $pageTitle = '')
    {
        $this->pageTitle = $pageTitle;
        $this->pageTitle = empty($this->pageTitle) ? config('app.name', 'Admin Panel') : $this->pageTitle;

        $this->footerScripts = $footerScripts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.admin.app');
    }
}
