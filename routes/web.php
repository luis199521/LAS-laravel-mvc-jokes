<?php
/**
 * Application Route Definitions
 *
 * Filename:        web.php
 * Location:        Routes/web.php
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:     28/10/2024
 *
 * Author:          Luis Alvarez  <20114831@tafe.wa.edu.au>

 */


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [StaticPageController::class, 'home'])
    ->name('static.home');


Route::get('/home', [StaticPageController::class, 'index'])
    ->middleware('auth') 
    ->name('auth.home');


Route::get('/about', [StaticPageController::class, 'about'])
    ->name('static.about');

Route::get('/contact', [StaticPageController::class, 'contact'])
    ->name('static.contact');    
require __DIR__.'/auth.php';
