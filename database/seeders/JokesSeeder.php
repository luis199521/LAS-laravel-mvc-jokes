<?php
/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
* Jokes Seeder
 *
 * Fill joke's table with sample data.
 *
 * Filename:        JokesSeeder.php
 * Location:        Database/Seeders
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    27/10/2024
 *
 * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Joke;

class JokesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jokes = [
            [
                'joke' => 'Why did the snake cross the road?To get to the other ssssssside! ',
                'category_id' => 3,
                'tags' => 'science, joke',
                'author_id' => 1,
            ],
            [
                'joke' => 'What do you call a bear with no ears? B!',
                'category_id' => 1,
                'tags' => 'halloween, joke',
                'author_id' => 1,
            ],
            [
                'joke' => 'What is a cheerleaders favorite color? Yeller! ',
                'category_id' => 2,
                'tags' => 'math, pun',
                'author_id' => 1,
            ]
        ];

        foreach ($jokes as $joke) {
            Joke::create($joke);
        }

        
    }
}
