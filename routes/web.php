<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/game', function () {
    return view('game');
})->name('game');
Route::get('/building', function () {
    return view('building');
})->name('building');

Route::controller(ApiController::class)->prefix('api')->group(function () {
    Route::get('/land_get_object', 'land_get_object')->name('api_land_get_object');
});

Route::controller(LandController::class)->group(function () {
    Route::get('/land_change_owner', 'land_change_owner')->name('land_change_owner');
    Route::get('/land_change_price', 'land_change_price')->name('land_change_price');
});

Route::controller(BuildingController::class)->group(function () {
    Route::get('/building_create', 'building_create')->name('building_create');
    Route::get('/building_store', 'building_store')->name('building_store');
});


Route::auto('/user', UserController::class);
