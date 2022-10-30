<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SideBarMenu extends Component
{
    public $isSuperAdmin = false;
    public $active = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $pengelola = Auth::user();
        $this->isSuperAdmin = ($pengelola->levelPengelola->level == 'Super admin');

        $routeName = Route::currentRouteName();
        $this->active[$routeName] = 'active';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.side-bar-menu');
    }
}
