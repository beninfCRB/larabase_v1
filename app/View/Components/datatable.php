<?php

namespace App\View\Components;

use Illuminate\View\Component;

class datatable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $table = $this->data;
        return view('components.data-table', compact('table'));
    }
}
