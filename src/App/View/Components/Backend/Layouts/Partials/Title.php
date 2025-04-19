<?php

namespace SazUmme\Publication\App\View\Components\Backend\Layouts\Partials;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Title extends Component
{
   
    public $title = "SazVerse - Ebook Publisher";
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('publication::components.backend.layouts.partials.title', ['title'=>$this->title]);
    }
}
