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
use App\Http\Controllers\UserController;
use App\Http\Controllers\JokeController;


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/


//Static Endpoints
Route::get('/', [StaticPageController::class, 'home'])
    ->name('static.home');


Route::get('/home', [StaticPageController::class, 'index'])
    ->middleware('auth', 'verified')    
    ->name('auth.home');


Route::get('/about', [StaticPageController::class, 'about'])
    ->name('static.about');

Route::get('/contact', [StaticPageController::class, 'contact'])
    ->name('static.contact');  
 
    Route::get('/joke/search', [JokeController::class, 'search'])
    ->name('joke.search');

// User Endpoints
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.home');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');   
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show'); 

    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit')
    ->middleware('can:update,user');


    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')
        ->middleware('can:update,user');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')
        ->middleware('can:delete,user');


});


// Joke Endpoints
Route::middleware('auth')->group(function () {
    Route::get('/jokes', [JokeController::class, 'index'])->name('jokes.home');
    Route::get('/jokes/create', [JokeController::class, 'create'])->name('jokes.create');
    Route::post('/jokes/store', [JokeController::class, 'store'])->name('jokes.store');
    Route::get('/jokes/search', [JokeController::class, 'search'])->name('jokes.search');
    Route::get('/jokes/{id}', [JokeController::class, 'show'])->name('jokes.show');

    Route::get('/jokes/edit/{joke}', [JokeController::class, 'edit'])->name('jokes.edit')
        ->middleware('can:update,joke');


        Route::put('/jokes/{joke}', [JokeController::class, 'update'])
        ->name('jokes.update')
        ->middleware('can:update,joke');
    

    Route::delete('/jokes/{joke}', [JokeController::class, 'destroy'])->name('jokes.destroy')
        ->middleware('can:delete,joke');
});





require __DIR__.'/auth.php';
