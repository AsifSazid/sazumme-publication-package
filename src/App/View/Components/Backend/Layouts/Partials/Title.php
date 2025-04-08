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

    public function __construct()
    {
        // TODO Applay caching mechanizm using session or redis or memcache
        // TODO use log for exception 
        if(config('genie.db.title'))
        {
            try{
                $setup = DB::table('core_configs')->where('key', 'title')->first();
                if(!is_null($setup)) {
                    $this->title = $setup->value;
                }
            }catch(Exception $e){
                dd($e);
                // (Schema::hasTable('core_configs'))
            }
        }


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
