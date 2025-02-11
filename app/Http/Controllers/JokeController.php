<?php

/**
 * Assessment Title: Portfolio Part 3
 * Cluster:          SaaS: Part 1 – Front End Development 
 * Qualification:    ICT50220 Diploma of Information Technology (Advanced Programming)
 * Name:             Luis Alvarez Suarez
 * Student ID:       20114831
 * Year/Semester:    2024/S2
 *
 *Joke Management Controller
 *
 * Provides access to Jokes pages.
 * 
 * Filename:        JokeController.php
 * Location:        /App/Http/Controllers
 * Project:         LAS-Laravel-mvc-jokes
 * Date Created:    29/09/2024
 *
 * Author:          Luis Alvarez <20114831@tafe.wa.edu.au>
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joke;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Parsedown;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JokeController extends Controller
{
    use AuthorizesRequests;

    /**
     * Get the number of jokes
     */

    public function numberJokes()
    {

        $totalJokes = Joke::count();

        return $totalJokes;
    }


    /**
     * Displays Jokes home page
     */

    public function index()
    {

        $jokes = Joke::all();
        $parsedown = new Parsedown();
        foreach ($jokes as $joke) {

            $joke->joke = $parsedown->text($joke->joke);
        }

        return view('jokes.home', [
            'jokes' => $jokes

        ]);
    }

    /**
     * Displays a random joke
     */
    public function showRandomJoke()
    {

        $jokes = Joke::inRandomOrder()->limit(1)->get();


        $parsedown = new Parsedown();


        foreach ($jokes as $joke) {
            $joke->joke = $parsedown->text($joke->joke);
        }


        return $jokes;
    }


    /**
     * Search jokes by keywords/location.
     */
    public function search(Request $request)
    {
        $keywords = $request->input('keywords', '');


        $jokes = Joke::where('joke', 'like', "%{$keywords}%")
            ->orWhere('tags', 'like', "%{$keywords}%")
            ->orderBy('joke')
            ->orderBy('tags')
            ->get();
        $parsedown = new Parsedown();
        foreach ($jokes as $joke) {
            $joke->joke = $parsedown->text($joke->joke);
        }

        if (Auth::check()) {


            return view('jokes.home', [
                'jokes' => $jokes,
                'keywords' => $keywords,
            ]);
        } else {

            return view('jokes.search', [
                'jokes' => $jokes,
                'keywords' => $keywords,
            ]);
        }
    }

    /**
     * Show a single joke
     *
     */

    public function show($id)
    {
        $joke = Joke::select(
            'jokes.id as id',
            'jokes.joke as joke_title',
            'jokes.category_id as category',
            'jokes.tags as tags',
            'jokes.author_id as author',
            'users.given_name as author_name',
            'jokes.created_at as created_at',
            'jokes.updated_at as updated_at'
        )
            ->join('users', 'jokes.author_id', '=', 'users.id')
            ->where('jokes.id', $id)
            ->first();

        if (!$joke) {
            return response()->view('errors.404', ['message' => 'Joke not found'], 404);
        }

        $parsedown = new Parsedown();
        $joke->joke_title = $parsedown->text($joke->joke_title);

        return view('jokes.show', [
            'joke' => $joke,
        ]);
    }



    /**
     * Show the jokes create form
     */
    public function create()
    {
        $categories = Category::all();

        return view('jokes.create', [
        'categories' => $categories
        ]);
    }

    /**
     * Store Jokes in database
     */

     public function store(Request $request)
     {

    
         $allowedFields = ['joke', 'tags', 'author_id']; 
     
         $validator = Validator::make($request->all(), [
             'joke' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
             'tags' => 'nullable|string',
         ], [
             'joke.required' => 'Joke is required.',
             'category_id.required' => 'Category is required.',
         ]);
     
         if ($validator->fails()) {
             return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
         }
     
        
         $category = Category::find($request->category_id);


     
         if (!$category) {
             return redirect()->back()->withErrors(['category_id' => 'Invalid category selected.'])->withInput();
         }
     
         
         $newJokeData = $request->only($allowedFields);
         $newJokeData['category_id'] = $category->id; 
         $newJokeData['author_id'] = Auth::id();
     
         Joke::create($newJokeData);
     
         Session::flash('success', 'Joke created successfully.');
     
         return redirect()->route('jokes.home');
     }
     

    /**
     * Show the user edit form
     */
    public function edit(Joke $joke)
    {


        $this->authorize('update', $joke);
        $categories = Category::all();

        return view('jokes.edit',[
            'joke' => $joke,
            'categories' => $categories

        ]);
    }



    /**
     * Update a user
     */

     public function update(Request $request, Joke $joke)
     {
         
         $this->authorize('update', $joke);
     
       
         $allowedFields = ['joke', 'tags', 'author_id']; 
     
         
         $validator = Validator::make($request->all(), [
             'joke' => 'required|string|max:255',
             'category_id' => 'nullable|integer|exists:categories,id', 
             'tags' => 'nullable|string',
         ], [
             'joke.required' => 'Joke is required.',
             'category_id.required' => 'Category is required.',
         ]);
     
         if ($validator->fails()) {
             return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
         }
     
         
         $category = Category::find($request->category_id);
     
         
         if (!$category && $request->category_id) {
             return redirect()->back()->withErrors(['category_id' => 'Invalid category selected.'])->withInput();
         }
     
         
         $updateJokeData = $request->only($allowedFields);
         
         
         $updateJokeData['category_id'] = $category ? $category->id : $joke->category_id;
     
         
         $updateJokeData['updated_at'] = now();
         $joke->update($updateJokeData);
     
         Session::flash('success', 'Joke updated successfully.');
     
         // Redirect to the joke show page
         return redirect()->route('jokes.show', $joke->id);
     }
     


    /**
     * Delete a Joke
     */
    public function destroy(Joke $joke)
    {


        $this->authorize('delete', $joke);


        $joke->delete();

        Session::flash('success', 'Joke deleted successfully');

        return redirect()->route('jokes.home');
    }


    /**
     * Get trashed jokes
     */

    public function trashed()
    {

        $jokes = Joke::onlyTrashed()->get();

        return view('jokes.trashed', ['jokes' => $jokes]);
    }


    /**
     * Restore trashed jokes
     */
    
    public function restore($id)
    {
        $joke = Joke::withTrashed()->findOrFail($id);
        $this->authorize('restore', $joke);
        $joke->restore();

        Session::flash('success', 'Joke restored successfully.');
        return redirect()->route('jokes.home');
    }


    /**
     * Permanently delele trashed jokes
     */
    public function forceDelete($id)
    {
        $joke = Joke::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $joke);

        $joke->forceDelete();

        Session::flash('success', 'Joke permanently deleted.');
        return redirect()->route('jokes.trashed');
    }
}
