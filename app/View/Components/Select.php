<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $data;
    public $name;
    public $label;
    public $value;
    public $method;
    public function __construct($label, $name, $data, $value = null, $method = '')
    {
        $this->data = $data;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = $this->data;
        return view('components.select', compact('data'));
    }
}
