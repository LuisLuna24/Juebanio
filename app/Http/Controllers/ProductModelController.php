<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductModelController extends Controller
{
    public function index()
    {
        return view('modules.products.models.index');
    }
}
