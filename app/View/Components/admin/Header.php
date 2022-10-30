<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $namaPengelola;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $pengelola = Auth::user();
        $this->namaPengelola = $pengelola->nama;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.header');
    }
}
