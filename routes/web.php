<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::resource('hotels',HotelController::class)
->only(['index','show','create','store']);

Route::resource('hotels.reviews',ReviewController::class)
->only(['index']);

Route::get('/', function () {
    return view('home');
});

Route::get('/pick_a_property',function(){
    return view('hotel.select-listing');
});




