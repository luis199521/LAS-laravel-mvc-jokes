<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    

    /**
     * A category has many jokes
     
    **/
    public function jokes()
    {
        return $this->hasMany(Joke::class);
    }
}
