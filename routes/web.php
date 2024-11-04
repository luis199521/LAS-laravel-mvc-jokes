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
use App\Models\Joke;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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
    
 //User Endpoints   

Route::get('/users', [UserController::class, 'index'])
    ->middleware('auth', 'verified')  
    ->name('users.home');   

Route::get('/users/create', [UserController::class, 'create'])
    ->middleware('auth', 'verified')  
    ->name('users.create');

Route::post('/users/store', [UserController::class, 'store'])
->middleware(['auth', 'verified'])  
    ->name('users.store');       
 
Route::get('/users/search', [UserController::class, 'search'])
->middleware('auth', 'verified')  
->name('users.search');   

Route::get('/users/{id}', [UserController::class, 'show'])
->middleware('auth', 'verified')  
->name('users.show'); 

Route::get('/users/edit/{id}', [UserController::class, 'edit'])
->middleware('auth', 'verified')  
->name('users.edit'); 

Route::put('/users/{id}', [UserController::class, 'update'])
->middleware('auth', 'verified')  
->name('users.update'); 

Route::delete('/users/{id}', [UserController::class, 'destroy'])
->middleware('auth', 'verified')  
->name('users.destroy'); 

//Jokes Endpoints

Route::get('/joke', [JokeController::class, 'index'])
    ->middleware('auth')  
    ->name('jokes.home');   

Route::get('/jokes/create', [JokeController::class, 'create'])
    ->middleware('auth')  
    ->name('jokes.create');

Route::post('/jokes/store', [JokeController::class, 'store'])
->middleware(['auth'])  
    ->name('jokes.store');       
 
Route::get('/jokes/search', [JokeController::class, 'search'])
->middleware('auth')  
->name('jokes.search');  


/*Route::get('/jokes/search', [JokeController::class, 'search'])
->name('jokes.search');*/

Route::get('/joke/{id}', [JokeController::class, 'show'])
->middleware('auth')  
->name('jokes.show'); 

Route::get('/jokes/edit/{id}', [JokeController::class, 'edit'])
->middleware('auth')  
->name('jokes.edit'); 

Route::put('/jokes/{id}', [JokeController::class, 'update'])
->middleware('auth')  
->name('jokes.update'); 

Route::delete('/jokes/{id}', [JokeController::class, 'destroy'])
->middleware('auth', 'verified')  
->name('jokes.destroy'); 




require __DIR__.'/auth.php';
