<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\pickPropertyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Auth\RegisterController as regController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;


Route::resource('register', regController::class)
->only(['index','store']);

Route::middleware(['guest'])->group(function(){

    Route::get('login', fn()=> to_route('auth.create'))
        ->name('login');

    Route::get('auth/create', [AuthenticatedSessionController::class, 'create'])
        ->name('auth.create');  
});



Route::resource('auth', AuthenticatedSessionController::class)
        ->only(['store']);



Route::middleware(['auth'])->group(function(){

    Route::resource('hotels',HotelController::class)
    ->only(['create','store']);

    Route::resource('hotels.reviews',ReviewController::class)
    ->only(['index','create','store']);

    Route::middleware('manager')
    ->get('pick_a_property',[pickPropertyController::class,'index']);

    Route::get('register/manager', [ManagerController::class, 'create'])
    ->name('manager.create');

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




