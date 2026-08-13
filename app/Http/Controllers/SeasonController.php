<?php

namespace App\Http\Controllers;

class SeasonController extends Controller
{
    public function index()
    {
        return view('modules.catalogs.seasons.index');
    }
}
