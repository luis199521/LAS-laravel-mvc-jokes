<?php

/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
 * Static Pages Managment
 *
 * Provides access to static pages such as home, contact and about pages.
 *
 * Filename:        StaticPageController.php
 * Location:        App/Controllers
 * Project:         LAS-LARAVEL-MVC-Jokes
 * Date Created:    27/10/2024
 *
 * Author:          Luis Alvarez Suarez <20114831@tafe.wa.edu.au>
 *
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\JokeController;
use App\Http\Controllers\UserController;

class StaticPageController extends Controller
{

    /*
     * Show the Enhance Home Page for Authenticated Users.
     */

    public function index()
    {


        $countJoke = new JokeController();
        $countJokes = $countJoke->numberJokes();

        $showJoke = new JokeController();
        $showJokes = $showJoke->showRandomJoke();

        $countUser = new UserController();
        $countUsers = $countUser->numberUsers();



        return view('auth.home', [
            'totalJokes' => $countJokes,
            'totalUsers' => $countUsers,
            'randomJoke' => $showJokes

        ]);
    }

    /*
     * Show the home static page when user logs in,  statistics  of number of users and jokes can be seen.
     */
    public function home()
    {

        $jokes = new JokeController();
        $joke = $jokes->showRandomJoke();
        return view('static.home', [
            'jokes' => $joke
        ]);
    }


    /*
     * Show the about static page
     */
    public function about()
    {

        return view('static.about');
    }

    /*
     * Show contact form
     */
    public function contact()
    {

        return view('static.contact');
    }
}
