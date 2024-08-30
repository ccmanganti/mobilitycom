<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/key', function(){
    artisan::call('key:generate');
});

Route::get('/optimize', function(){
    artisan::call('optimize:clear');
});

Route::get('/migrate', function(){
    artisan::call('migrate:refresh');
});

Route::get('/seed', function(){
    artisan::call('db:seed', ['--class=RolesAndPermissionSeeder']);
});

Route::get('/composer-install', function(){
    artisan::call('composer:install');
});
