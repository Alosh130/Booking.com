<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pickPropertyController extends Controller
{
    public function index()
    {
        return view('hotel.select-listing');
    }
}
