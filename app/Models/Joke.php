<?php

/**
 * Jokes Model
 *
 * Provides Methods to handle Joke's data.
 *
 * Filename:        Joke.php
 * Location:        App/Models
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    27/10/2024
 *
 * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Joke extends Model
{

    use HasFactory;
    
    protected $fillable = ['joke', 'category_id', 'tags', 'author_id'];



    /**
     * Get the user who created the joke.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
