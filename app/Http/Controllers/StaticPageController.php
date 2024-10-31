<?php
/**
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
     *
     * @return void
     */

     public function index(){


        $countJoke = new JokeController();
        $countJokes = $countJoke->numberJokes();

        $countUser = new UserController();
        $countUsers = $countUser->numberUsers();



        return view('auth.home', [
            'totalJokes' => $countJokes,
            'totalUsers' => $countUsers
        ]);
     }

    /*
     * Show the home static page when user logs in,  statistics  of number of users and jokes can be seen.
     *
     * @return void
     */
    public function home()
    {

        //fetching number of jokes
       /*$jokes = new JokeController();
        
        $countJokes = $jokes->numberJokes();

        //fetching number of users
        $users = new UserController();
        
        $countUsers = $users->numberUsers();

         loadView('/home', [
            'totalJokes' => $countJokes,
            'totalUsers'=> $countUsers
        ]);*/
        return view('static.home');
    }


     /*
     * Show the about static page
     *
     * @return void
     */
    public function about()
    {
        //loadView('staticPages/about');
        return view('static.about');
    }

    /*
     * Show contact form
     *
     * @return void
     */
    public function contact()
    {
        //loadView('staticPages/about');
        return view('static.contact');
    }


    
}
