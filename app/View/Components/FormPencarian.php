<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormPencarian extends Component
{
    public $keyword;
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($keyword = "", $action = '')
    {
        $this->keyword = urldecode($keyword);
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.FormPencarian');
    }
}
