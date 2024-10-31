<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joke;
class JokeController extends Controller
{
    public function numberJokes()
    {
        
        $totalJokes = Joke::count(); 

        return $totalJokes; 
    }
}
