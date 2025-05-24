<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class indexController extends Controller
{
    public function index()
    {
        $cities = Hotel::select( 'city')
        ->whereNotNull('city')
        ->distinct()
        ->limit(5)
        ->get();

        $governorates = Hotel::select('Governorate')
        ->whereNotNull('Governorate')
        ->distinct()
        ->limit(5)
        ->get();

        return view('home', [
            'cities' => $cities,'governorates' => $governorates
        ]);
    }
}
