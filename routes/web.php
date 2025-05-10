<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::resource('hotels',HotelController::class)
->only(['index','show']);

Route::resource('hotels.reviews',ReviewController::class)
->only(['index']);

Route::get('/', function () {
    return view('home');
});




