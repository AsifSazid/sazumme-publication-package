<?php

namespace SazUmme\Publication\App\View\Components\Frontend\Layouts\Partials;

use Illuminate\View\Component;

class CompanyName extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function render()
    {
        return view('publication::components.frontend.layouts.partials.company-name');
    }
}
