<?php

namespace SazUmme\Publication\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
//use another classes

class PublicationBaseController extends Controller
{
    public function index()
    {
        return view('publication::frontend.landing', []);
    }
}
