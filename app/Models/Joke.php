<?php
/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
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
 */



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class Joke extends Model
{

    use HasFactory;
    use HasRoles;
    use SoftDeletes;
    
    protected $fillable = ['joke', 'category_id', 'tags', 'author_id'];



    /**
     * Get the user who created the joke.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

     /**
     * A joke belongs to a category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
