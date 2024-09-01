<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Custom Imports
use App\Http\Controllers\UserController;
use App\Http\Controllers\GlovesController;
use App\Http\Controllers\ActionsController;
use App\Http\Controllers\ReadingsController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::resource('users', UserController::class);
Route::resource('gloves', GlovesController::class);
Route::post('gloves/check-serial', [GlovesController::class, 'check_serial']);
Route::resource('actions', ActionsController::class);
Route::resource('readings', ReadingsController::class);