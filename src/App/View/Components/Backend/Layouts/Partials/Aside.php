<?php

namespace SazUmme\Publication\App\View\Components\Backend\Layouts\Partials;

use Exception;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Aside extends Component
{
    public $navigations = null;

    public function __construct($navigations)
    {
        $this->navigations = $navigations;
    }

    public function render()
    {
        return view('publication::components.backend.layouts.partials.aside', ['navigations'=>$this->navigations]);
    }
}
