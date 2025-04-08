<?php

namespace SazUmme\Publication\App\View\Components\Backend\Layouts\Partials;

use Illuminate\View\Component;

class Meta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * @TODO
         *
         * also note meta contains csrf token. so hiding it may create inconsistancy in case. keep an eye here
         *
         * Meta at this moment is not configurable.
         * It will be visible always
         * We need to update meta.blade.php if we want to update meta information
         *
         * It is not database driven as well. We need development if we want to configure meta through database
         */
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('publication::components.backend.layouts.partials.meta');
    }
}
