<?php

namespace SazUmme\Publication\Http\Controllers;

class EbookController extends PublicationBaseController
{
    public function index()
    {
        return view('publication::backend.ebooks.index');
    } 

    public function myEbooks()
    {
        return null;
    }
}
