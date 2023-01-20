<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButton extends Component
{
    public $type;
    public $url;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $url)
    {
        $this->type = $type;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action-button');
    }
}
