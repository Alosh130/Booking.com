<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Auth\RegisterController as regController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


Route::resource('register', regController::class)
->only(['index','store']);

Route::get('login', fn()=> to_route('auth.create'))
        ->name('login');

Route::get('auth.create', [AuthenticatedSessionController::class, 'create'])
        ->name('auth.create');

Route::resource('auth', AuthenticatedSessionController::class)
        ->only(['create','store']);



Route::middleware(['auth'])->group(function(){

    Route::resource('hotels',HotelController::class)
    ->only(['create','store']);

    Route::resource('hotels.reviews',ReviewController::class)
    ->only(['index','create','store']);

    Route::get('/pick_a_property',function(){
    return view('hotel.select-listing');
    });

    Route::resource('hotels.rooms',RoomController::class)
    ->only(['create','store']);

    
});
Route::resource('hotels',HotelController::class)
->only(['index','show']);



Route::get('/', function () {
    return view('home');
});

Route::delete('logout', fn()=> to_route('auth.destroy'))
    ->name('logout');

Route::delete('auth.destroy', [AuthenticatedSessionController::class, 'destroy'])
    ->name('auth.destroy');




