<?php

namespace SazUmme\Publication\App\View\Components\Frontend\Layouts;

use Illuminate\View\Component;

class Master extends Component
{

    public function __construct()
    {

    }

    public function render()
    {
        return view('publication::components.frontend.layouts.master');
    }
}
