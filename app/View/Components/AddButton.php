<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $module;
    public function __construct($module)
    {
        $this->module = $module;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-button');
    }
}
