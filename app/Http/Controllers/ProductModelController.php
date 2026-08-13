<?php

namespace App\Http\Controllers;

class ProductModelController extends Controller
{
    public function index()
    {
        return view('modules.products.models.index');
    }
}
