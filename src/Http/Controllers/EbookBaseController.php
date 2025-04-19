<?php

namespace SazUmme\Publication\Http\Controllers;

use App\Http\Controllers\Controller;
//use another classes

class EbookBaseController extends Controller
{
    public function index()
    {
        return view('publication::frontend.landing', []);
    }
}
