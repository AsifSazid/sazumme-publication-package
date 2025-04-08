<?php

namespace SazUmme\Publication\App\View\Components\Backend\Layouts;

use Illuminate\View\Component;

class Master extends Component
{

    public function __construct()
    {

    }

    public function render()
    {
        return view('publication::components.backend.layouts.master');
    }
}
